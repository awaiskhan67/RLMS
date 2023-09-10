<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Agreement;
use App\Models\Invoice;
use Carbon\Carbon;

class GenerateInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoices:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate invoices for active agreements';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // Retrieve active agreements
        $activeAgreements = Agreement::where('status', 1)->get();

        foreach ($activeAgreements as $agreement) {
            // Convert next_rent_due to a Carbon date instance
            $agreement->next_rent_due = Carbon::parse($agreement->next_rent_due); 

            // Check if an invoice already exists for this agreement and the current billing cycle
            $startingMonth = Carbon::now()->startOfMonth();
            $endingMonth = Carbon::now()->endOfMonth();
            $existingInvoice = Invoice::where('agreement_id', $agreement->id)
            ->whereBetween('due_date', [$startingMonth, $endingMonth]);

            if ($agreement->payment_frequency === 'monthly') {
            $existingInvoice->whereMonth('due_date', Carbon::now()->month);
            } elseif ($agreement->payment_frequency === 'quarterly') {
            $existingInvoice->where(function ($query) {
                $query->whereMonth('due_date', Carbon::now()->month)
                    ->orWhereMonth('due_date', Carbon::now()->subMonths(2)->month)
                    ->orWhereMonth('due_date', Carbon::now()->subMonths(1)->month);
            });
            } elseif ($agreement->payment_frequency === 'half_yearly') {
            $existingInvoice->where(function ($query) {
                $query->whereMonth('due_date', Carbon::now()->month)
                    ->orWhereMonth('due_date', Carbon::now()->subMonths(5)->month);
            });
            } elseif ($agreement->payment_frequency === 'yearly') {
                $existingInvoice->whereYear('due_date', Carbon::now()->year);
            }

            $existingInvoice = $existingInvoice->first();

            if ($existingInvoice) {
            // Skip creating a new invoice for this agreement this billing cycle
              continue;
            }

    
            $invoiceAmount = $agreement->rent;
    
            // Apply late fee if applicable
            $lateFeeAmount = 0; // Default late fee amount
            if ($agreement->late_fee_active === 1 && Carbon::today()->diffInDays($agreement->next_rent_due) > $agreement->late_fee_days) {
                $lateFeeAmount = $agreement->late_fee_amount;
                $invoiceAmount += $lateFeeAmount;
                // Calculate the late fee over date by adding late_fee_days to next_rent_due
                $lateFeeOverDate = $agreement->next_rent_due->copy()->addDays($agreement->late_fee_days)->toDateString();
            } else {
                $lateFeeAmount = 0;
                $lateFeeOverDate = null;
            }

            // Create a new invoice
            $invoice = new Invoice();
            $invoice->agreement_id = $agreement->id;
            $invoice->rent_amount = $invoiceAmount - $lateFeeAmount;
            $invoice->total_amount = $invoiceAmount;
            $invoice->late_fee_amount = $lateFeeAmount; // Store late fee amount in the invoice
            $invoice->latefee_over_date = $lateFeeOverDate; // Store late fee over date
            $invoice->due_date = $agreement->next_rent_due;
            $invoice->status = Invoice::STATUS_UNPAID;
            $invoice->save();
    
            // Update next_rent_due date based on payment frequency
            $agreement->updateNextRentDue();
        }

    }
}
