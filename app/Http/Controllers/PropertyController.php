<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pcategory;
use App\Models\Property;
use App\Models\Agreement;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    //
    public function cat_index(){

        $category = Pcategory::orderby('id','desc')->get();
        return view ('Pcategory', compact('category'));
    }

    public function cat_store(Request $request){

        $request->validate([
            'name' => 'required|unique:pcategories',
            'des' => ['required', 'string', 'max:255'],
        ]);

        //insert the record vid model
        $cat = new Pcategory;
        $cat->name = $request->name;
        $cat->shortDes = $request->des;
        $cat->entry_id = Auth::user()->id;
        //working with image}

        $cat->save();
        return back()->with("success", "Property category added successfully ! ");
    }

    public function cat_edite(Request $request , $id){

        $cat= Pcategory::find($id);
        return view('PcategoryEdite', compact('cat'));
    }

    public function cat_update(Request $request){

        $request->validate([
            'name' => 'required|unique:pcategories,name,'.$request->id,
            'des' => ['required', 'string', 'max:255'],
        ]);
        $cat = Pcategory::find($request->id);

        //end section
        $cat->name = $request->name;
        $cat->shortDes = $request->des;
        $cat->save();
        return redirect()->route('pcategory')->with("success", "Property category Updated successfully ");

    }

    public function cat_delete(Request $request , $id){
        $ex = Pcategory::find($id);
        $ex->delete();
        return redirect()->route('pcategory')->with("warning", "Property category deleted successfuly !  ");
    }


    //
    public function prop_index(){
        $property = Property::orderby('id','desc')->get();
        $pcategory = Pcategory::all();
        $lastSerialNo = Property::max('serial_no') ?? 0;
        return view ('Property', compact('property','pcategory','lastSerialNo'));
    }

    //
    public function prop_store(Request $request){

        $request->validate([
            'name' => 'required|unique:properties', // Change the table name to properties
            'serial' => 'required',
            'category' => 'required',
            'country' => 'required',
            'district' => 'required',
            'street' => 'required',
            'city' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max size as needed
            'description' => 'required|string|max:255',
        ]);
    
        $property = new Property;
        $property->serial_no = $request->serial;
        $property->name = $request->name;
        $property->category_id = $request->category;
        $property->country = $request->country;
        $property->district = $request->district;
        $property->street = $request->street;
        $property->city = $request->city;
        $property->shortDes = $request->description;
        $property->entry_id = Auth::user()->id;
    
        // Working with image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ex;
            $file->move(public_path('uploads'), $filename);
            $property->image = $filename;
        }
    
        $property->save();
    
        return back()->with("success", "Property added successfully!");
        

    }

    //
    public function prop_edite(Request $request , $id){
        $property= Property::find($id);
         // Retrieve the last serial number
         $pcategory = Pcategory::all();
        return view('PropertyEdite', compact('property','pcategory'));
    }

    //
    public function prop_update(Request $request){

        $request->validate([
            'name' => 'required|unique:properties,name,' . $request->id,
            'serial' => 'required',
            'category' => 'required',
            'country' => 'required',
            'district' => 'required',
            'street' => 'required',
            'city' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:255',
        ]);
    
        $property = Property::findOrFail($request->id);
        $property->name = $request->name;
        $property->category_id = $request->category;
        $property->country = $request->country;
        $property->district = $request->district;
        $property->street = $request->street;
        $property->city = $request->city;
        $property->shortDes = $request->description;
    
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
    
        return redirect()->route('property')->with("success", "Property updated successfully!");

    }

    //
    public function prop_delete(Request $request , $id){
        $ex = Property::find($id);
        if($ex->image){
            if(\file_exists(public_path('uploads/'.$ex->image))){
            unlink(public_path('uploads/'.$ex->image));
            }
        }  
        $ex->delete();
        return redirect()->route('property')->with("warning", "Property deleted successfuly !  ");
    }

    //
    public function property_profile(Request $request , $id){
        $property = Property::find($id);

        // Find all agreements associated with the property
        $agreements = Agreement::where('property_id', '=', $id)->get();
    
        // Initialize an empty array to store invoices for all agreements
        $allInvoices = [];
    
        foreach ($agreements as $agreement) {
            // Find all invoices associated with the current agreement
            $invoices = Invoice::with('agreement.tenant')->where('agreement_id', '=', $agreement->id)->get();
            
            // Add the invoices for the current agreement to the array
            $allInvoices = array_merge($allInvoices, $invoices->toArray());
        }
    
        // Calculate the total invoice amount by summing the amounts from all invoices
        $totalInvoiceAmount = collect($allInvoices)->sum('total_amount');



         // Initialize an empty array to store payments for all agreements
        $allPayments = [];

        foreach ($agreements as $agreement) {
            // Find all payments associated with the current agreement
            $payments = Payment::with('agreement.tenant','tenant','user')->where('agreement_id', '=', $agreement->id)->get();

            // Add the payments for the current agreement to the array
            $allPayments = array_merge($allPayments, $payments->toArray());
        }

        // Calculate the total paid amount by summing the amounts from all payments
        $totalPaidAmount = collect($allPayments)->sum('amount');
    
        return view('propertyProfile', compact('property', 'agreements', 'allInvoices', 'totalInvoiceAmount', 'allPayments' , 'totalPaidAmount'));
    }
}
