<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Guarantor;
use App\Models\Agreement;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Credit;
use App\Models\Cwallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Companyprofile;
class PaymentController extends Controller
{
    //this is the index file for payment
    public function index(){
        $guarantor = Guarantor::orderby('id','desc')->get();
        $agreement = Agreement::where('status','=', 1)->get();
        return view ('RentPayment', compact('guarantor','agreement'));
    }

    //this function shows the agreement details 
    public function agreement_details(Request $request, $id){
        $agreement = Agreement::with('property.pcategory', 'tenant')->findOrFail($id);
        return response()->json(['agreement' => $agreement]);
    }

    // Create a new controller method in app/Http/Controllers/InvoiceController.php
    public function fetchInvoices(Request $request, $id) {
        $invoices = Invoice::where('agreement_id', $id)
        ->whereIn('status', ['unpaid', 'partially_paid'])
        ->get();

        // Initialize variables to store total amounts
        $totalDueAmount = 0;
        $totalLateFeeAmount = 0;
        $totalPartiallyPaidAmount = 0;

        foreach ($invoices as $invoice) {
            // Calculate total due amount
            $totalDueAmount += $invoice->rent_amount;

            // Check if late fee is active
            if ($invoice->agreement->late_fee_active == 1) {
                $totalLateFeeAmount += $invoice->late_fee_amount;
            }

            // Check if the invoice is partially paid
            if ($invoice->status === 'partially_paid') {
                $totalPartiallyPaidAmount += $invoice->paid_amount;
            }


        }

        // Calculate the remaining amount
        $remainingAmount = $totalDueAmount + $totalLateFeeAmount - $totalPartiallyPaidAmount;

        return response()->json([
            'invoices' => $invoices,
            'totalDueAmount' => $totalDueAmount,
            'totalLateFeeAmount' => $totalLateFeeAmount,
            'totalPartiallyPaidAmount' => $totalPartiallyPaidAmount,
            'remainingAmount' => $remainingAmount,
        ]);
    }
    
    //this is the actual rent pay sections 
    public function store(Request $request){
       // Get selected invoice IDs from the form input
            $invoiceIds = $request->input('selected_invoices');

            // Fetch total amounts for the selected invoices
            $totalInvoiceAmount = Invoice::whereIn('id', $invoiceIds)->sum('total_amount');

            // Calculate the actual total paid amount
            $actualPaidAmount = $request->input('paid_amount');

            // Determine the agreement ID
            $agreementId = $request->input('agreement_id');

            // Find the agreement to get the tenant ID
            $agreement = Agreement::find($agreementId);
            $tenantId = $agreement->tenant_id;

            // Check if extra amount was paid
            if ($actualPaidAmount > $totalInvoiceAmount) {
                $extraAmount = $actualPaidAmount - $totalInvoiceAmount;

                // Update the tenant's credit balance
                $tenantWallet = Credit::where('tenant_id', $tenantId)->first();
                $tenantWallet->amount += $extraAmount;
                $tenantWallet->save();
            }

            // This is the check file upload
            if ($request->hasFile('check')) {
                $file = $request->file('check');
                $ex = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ex;
                $file->move(public_path('Bankchecks'), $filename);
                $check = $filename;
            } else {
                $check = null;
            }

            // Start a database transaction
            DB::beginTransaction();

            try {
                // Create a new payment record for the entire payment
                $payment = Payment::create([
                    'agreement_id' => $agreementId,
                    'property_id' => $agreement->property_id, // You need to retrieve this based on your application logic
                    'tenant_id' => $tenantId,
                    'pay_date' => $request->input('pay_date'), // You can adjust the pay date as needed
                    'amount' => $actualPaidAmount,
                    'payment_type' => $request->input('pay_type'),
                    'bank_name' => $request->input('bank_name'),
                    'bank_branch' => $request->input('branch_name'),
                    'bank_account' => $request->input('account_number'),
                    'bank_code' => $request->input('bank_number'),
                    'check_number' => $request->input('check_number'),
                    'check_file' => $check,
                    'entry_id' => Auth::user()->id, // You need to retrieve this based on your application logic
                    // Add other relevant fields
                ]);

                // Associate the selected invoices with the payment
                $payment->invoices()->attach($invoiceIds);

                // Update the invoice statuses to "paid"
                Invoice::whereIn('id', $invoiceIds)->update(['status' => 'paid']);

                // Commit the transaction
                DB::commit();

                // Handle any additional logic, such as updating company accounts
                $companyAccount = Cwallet::first(); // Assuming company account ID is 1
                $companyAccount->credit_mount += $actualPaidAmount;
                $companyAccount->save();

                // Redirect or return a response as needed
                return redirect()->route('rent.Transactions')->with("success", "Rent paid successfully!");
            } catch (\Exception $e) {
                // Handle exceptions, log errors, and roll back the transaction on failure
                DB::rollBack();
                // Handle the error gracefully and notify the user
                return redirect()->route('rent.Transactions')->with("warning", "Payment failed: " . $e->getMessage());
            }
    }

    //this is transaction list sections 

    public function list(){
        $payments = Payment::orderby('id','desc')->get();
        
        return view ('RentPaymentList', compact('payments'));
    }

    //this is the rent payment slip print 
    public function printInvoice($Id){
        // Fetch the invoice data using $invoiceId
         // Retrieve the payment and its associated invoices with related data
        $payment = Payment::with('invoices')->findOrFail($Id);
        $company = Companyprofile::first();
        // Pass the invoice data to the view

        return view('PayslipPrint', compact('payment','company'));
    }

    //ths is the payment confirm section

    public function paymentConfirm($id){
        $payment = Payment::findOrFail($id);
        $payment->confirm = 1;
        $payment->save();
        return back()->with("success", "Rent payment approved!");
    }

    //this is section for payment cancel part 
    public function paymentcancel($id){
        try {
            // Start a database transaction
            DB::beginTransaction();
        
            // Find the payment you want to cancel
            $payment = Payment::find($id);
        
            if (!$payment) {
                // Handle the case where the payment is not found
                throw new \Exception('Payment not found.');
            }
        
            // Update the payment status to "canceled" (you can use 0 to represent canceled)
            $payment->status = 0; // Update with the appropriate status value
            $payment->save();
        
            // Remove the association between invoices and the payment
            $payment->invoices()->detach();
        
            // Update the invoice statuses to "unpaid"
            foreach ($payment->invoices as $invoice) {
                dd($invoice->status);
                $invoice->status = 'unpaid';
                $invoice->save();
            }
        
            // Adjust the tenant's credit balance if necessary (you may need to adjust this logic)
            $extraAmount = $payment->amount - $payment->invoices->sum('total_amount');
            if ($extraAmount > 0) {
                $tenantWallet = Credit::where('tenant_id', $payment->tenant_id)->first();
                $tenantWallet->amount -= $extraAmount;
                $tenantWallet->save();
            }
        
            // Adjust the company's credit balance
            $companyAccount = Cwallet::first(); // Assuming company account ID is 1
            $companyAccount->credit_mount -= $payment->amount;
            $companyAccount->save();
        
            // Commit the transaction
            DB::commit();
        
            // Redirect or return a response as needed
            return back()->with("warning", "Rent payment cacncled now!");
        } catch (\Exception $e) {
            // Handle exceptions, log errors, and roll back the transaction on failure
            DB::rollBack();
        
            // Handle the error gracefully and notify the user
            return back()->with("warning", "failed: " . $e->getMessage());
        }
        
    }

}
