<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use App\Models\Companyprofile;
class InvoiceController extends Controller
{
    //

    public function index()
    {
        $years = DB::table('invoices')
        ->select(DB::raw('YEAR(created_at) as year'))
        ->distinct()
        ->orderBy('year', 'desc')
        ->get();

        $yearlyData = [];

        foreach ($years as $year) {
            $invoices = Invoice::whereYear('created_at', $year->year)->get();
            $yearlyData[] = [
                'year' => $year->year,
                'count' => $invoices->count(),
                'total' => $invoices->sum('total_amount'),
            ];
        }
    
        return view('Invoices', compact('yearlyData'));
    }


    public function show($year)
    {
        $selectedYear = $year;
        $invoices = Invoice::whereYear('created_at', $year)
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->get();
    
        return view('InvoicesShow', compact('invoices', 'selectedYear'));
    }

    public function printInvoice($invoiceId)
    {
        // Fetch the invoice data using $invoiceId
        $invoice = Invoice::find($invoiceId);

        $company = Companyprofile::first();

        // Pass the invoice data to the view
        return view('InvoicePrint', compact('invoice','company'));
    }

    

    

}
