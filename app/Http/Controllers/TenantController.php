<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use App\Models\Guarantor;
use App\Models\Credit;
use App\Models\Invoice;
use App\Models\Agreement;

class TenantController extends Controller
{
    //
    public function index(){
        $tenant = Tenant::orderby('id','desc')->get();
        $lastSerialNo = Tenant::max('serial_no') ?? 0;
        $gaurantor = Guarantor::all();
        return view ('Tenant', compact('tenant','lastSerialNo','gaurantor'));
    }

    //
    public function store(Request $request){

        $request->validate([
            'serial' => ['required'],
            'f_name' => ['required' , 'max:255'], // Change the table name to properties
            'l_name' => ['nullable' , 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:tenants'],
            'cnic' => ['required','max:255','unique:tenants'],
            'country' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'address' => ['required','max:255'],
            'contact1' => ['required',  'max:255', 'unique:tenants'],
            'contact2' => ['nullable', 'max:255', 'unique:tenants'],
            'contact3' => ['nullable', 'max:255', 'unique:tenants'],
            'guarantor1' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif' , 'max:2048'], // Adjust max size as needed
        ]);

        //unique gaurantor select 
        $values = [];
        // Retrieve and store input values
        if ($request->has('guarantor1')) {
            $values[] = $request->guarantor1;
        }
        
        if ($request->has('guarantor2')) {
            $values[] = $request->guarantor2;
        }
        
        if ($request->has('guarantor3')) {
            $values[] = $request->guarantor3;
        }
        
        // Add more inputs as needed
        $uniqueCount = count(array_unique($values));
        if ($uniqueCount !== count($values)) {
            return back()->with("warning", "You selected the same guarantor multiple times. Please select different guarantors.");
        }        
        // end unique validation end 

        $property = new Tenant;
        $property->serial_no = $request->serial;
        $property->f_name = $request->f_name;
        $property->l_name = $request->l_name;
        $property->email = $request->email;
        $property->cnic = $request->cnic;
        $property->country = $request->country;
        $property->city = $request->city;
        $property->address = $request->address;
        $property->contact1 = $request->contact1;
        $property->contact2 = $request->contact2;
        $property->contact3 = $request->contact3;
        $property->guarantor1 = $request->guarantor1;
        $property->guarantor2 = $request->guarantor2;
        $property->guarantor3 = $request->guarantor3;
        $property->entry_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if($property->image){
                if(\file_exists(public_path('uploads/'.$property->image))){
                unlink(public_path('uploads/'.$property->image));
                }
            }            
    
            // Upload the new image
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ex;
            $file->move(public_path('uploads'), $filename);
            $property->image = $filename;
        }


        
        $property->save();

        $credit = new Credit;
        $credit->tenant_id = $property->id;
        $credit->amount = 0;
        $credit->save();

        return back()->with("success", "Tenant added successfully!");
        

    }

    //
    public function edite(Request $request , $id){
        $property = Tenant::find($id);
        $gaurantor = Guarantor::all();
         // Retrieve the last serial number
        return view('TenantEdite', compact('property','gaurantor'));
    }

    //
    public function update(Request $request){

        $request->validate([
            'f_name' => ['required', 'max:255'],
            'l_name' => ['nullable', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:tenants,email,' . $request->id],
            'cnic' => ['required', 'max:255', 'unique:tenants,cnic,' . $request->id],
            'country' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'contact1' => ['required', 'max:255', 'unique:tenants,contact1,' . $request->id],
            'contact2' => ['nullable', 'max:255', 'unique:tenants,contact2,' . $request->id],
            'contact3' => ['nullable', 'max:255', 'unique:tenants,contact3,' . $request->id],
            'guarantor1' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Adjust max size as needed
        ]);

        //unique gaurantor select 
        $values = [];
        // Retrieve and store input values
        if ($request->has('guarantor1')) {
            $values[] = $request->guarantor1;
        }
        
        if ($request->has('guarantor2')) {
            $values[] = $request->guarantor2;
        }
        
        if ($request->has('guarantor3')) {
            $values[] = $request->guarantor3;
        }
        
        // Add more inputs as needed
        $uniqueCount = count(array_unique($values));
        if ($uniqueCount !== count($values)) {
            return back()->with("warning", "You selected the same guarantor multiple times. Please select different guarantors.");
        }        
        // end unique validation end 

        // Retrieve the existing tenant record
        $tenant = Tenant::findOrFail($request->id);

        // Update the tenant record with new values
        $tenant->serial_no = $request->serial;
        $tenant->f_name = $request->f_name;
        $tenant->l_name = $request->l_name;
        $tenant->email = $request->email;
        $tenant->cnic = $request->cnic;
        $tenant->country = $request->country;
        $tenant->city = $request->city;
        $tenant->address = $request->address;
        $tenant->contact1 = $request->contact1;
        $tenant->contact2 = $request->contact2;
        $tenant->contact3 = $request->contact3;
        $tenant->guarantor1 = $request->guarantor1;
        $tenant->guarantor2 = $request->guarantor2;
        $tenant->guarantor3 = $request->guarantor3;

        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($tenant->image && \file_exists(public_path('uploads/'.$tenant->image))) {
                unlink(public_path('uploads/'.$tenant->image));
            }

            // Upload the new image
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ex;
            $file->move(public_path('uploads'), $filename);
            $tenant->image = $filename;
        }

        $tenant->save();

        return redirect()->route('tenant')->with("success", "Tenant updated successfully!");
        

    }

    //
    public function delete(Request $request , $id){
        $ex = Tenant::find($id);
        if($ex->image){
            if(\file_exists(public_path('uploads/'.$ex->image))){
            unlink(public_path('uploads/'.$ex->image));
            }
        }  
        $ex->delete();
        return redirect()->route('tenant')->with("warning", "Tenant deleted successfuly !  ");
    }

    public function g_show(Request $request, $id){
        $user = Guarantor::findOrFail($id);
        return response()->json($user);
    }

    public function tenant_profile(Request $request , $id){
        $tenant = Tenant::find($id);
        $tenant_wallet = Credit::where('tenant_id','=',$id)->first();

        // Total Invoice Amount
        $totalInvoiceAmount = Invoice::whereHas('agreement', function ($query) use ($id) {
            $query->where('tenant_id', $id);
        })->sum('total_amount');

        // Total Active Agreements
        $totalActiveAgreements = Agreement::where('tenant_id', $id)
            ->where('status', '1')
            ->count();

        // All Agreements
        $agreements = Agreement::where('tenant_id', $id)->get();

        // All Invoices
        $invoices = Invoice::whereHas('agreement', function ($query) use ($id) {
            $query->where('tenant_id', $id);
        })->get();

        // Load invoices for each agreement
        foreach ($agreements as $agreement) {
            $agreement->invoices = $invoices->where('agreement_id', $agreement->id);
        }


      return view('tenantProfile',compact('tenant','tenant_wallet', 'totalInvoiceAmount', 'totalActiveAgreements', 'agreements', 'invoices'));
    }

}
