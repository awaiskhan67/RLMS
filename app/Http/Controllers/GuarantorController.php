<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guarantor;
use Illuminate\Support\Facades\Auth;
class GuarantorController extends Controller
{
    //
        //
        public function index(){
            $guarantor = Guarantor::orderby('id','desc')->get();
            return view ('Guarantor', compact('guarantor'));
        }
    
        //
        public function store(Request $request){
    
            $request->validate([
                'f_name' => ['required' , 'max:255'], // Change the table name to properties
                'l_name' => ['nullable' , 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:guarantors'],
                'cnic' => ['required','max:255','unique:guarantors'],
                'country' => ['required', 'max:255'],
                'city' => ['required', 'max:255'],
                'address' => ['required','max:255'],
                'contact1' => ['required',  'max:255', 'unique:guarantors'],
                'contact2' => ['nullable', 'max:255', 'unique:guarantors'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif' , 'max:2048'], // Adjust max size as needed
            ]);

            $property = new Guarantor;
            $property->f_name = $request->f_name;
            $property->l_name = $request->l_name;
            $property->email = $request->email;
            $property->cnic = $request->cnic;
            $property->country = $request->country;
            $property->city = $request->city;
            $property->address = $request->address;
            $property->contact1 = $request->contact1;
            $property->contact2 = $request->contact2;
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
        
            return back()->with("success", "Gurantor added successfully!");
            
    
        }
    
        //
        public function edite(Request $request , $id){
            $property = Guarantor::find($id);
             // Retrieve the last serial number
            return view('GuarantorEdite', compact('property'));
        }
    
        //
        public function update(Request $request){
    
            $request->validate([
                'f_name' => ['required', 'max:255'],
                'l_name' => ['nullable', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:guarantors,email,' . $request->id],
                'cnic' => ['required', 'max:255', 'unique:guarantors,cnic,' . $request->id],
                'country' => ['required'],
                'city' => ['required', 'max:255'],
                'address' => ['required', 'max:255'],
                'contact1' => ['required', 'string', 'max:255', 'unique:guarantors,contact1,' . $request->id],
                'contact2' => ['nullable', 'string', 'max:255', 'unique:guarantors,contact2,' . $request->id],
                'image' => ['nullable', 'image' ,'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ]);
            
            
            $property = Guarantor::findOrFail($request->id);
            $property->f_name = $request->f_name;
            $property->l_name = $request->l_name;
            $property->email = $request->email;
            $property->cnic = $request->cnic;
            $property->country = $request->country;
            $property->city = $request->city;
            $property->address = $request->address;
            $property->contact1 = $request->contact1;
            $property->contact2 = $request->contact2;
            
            if ($request->hasFile('image')) {
                if ($property->image && \file_exists(public_path('uploads/' . $property->image))) {
                    unlink(public_path('uploads/' . $property->image));
                }
            
                $file = $request->file('image');
                $ex = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ex;
                $file->move(public_path('uploads'), $filename);
                $property->image = $filename;
            }
            
            $property->save();
            
            return redirect()->route('guarantor')->with("success", "Guarantor updated successfully!");
            
    
        }
    
        //
        public function delete(Request $request , $id){
            $ex = Guarantor::find($id);
            if($ex->image){
                if(\file_exists(public_path('uploads/'.$ex->image))){
                unlink(public_path('uploads/'.$ex->image));
                }
            }  
            $ex->delete();
            return redirect()->route('guarantor')->with("warning", "Guarantor deleted successfuly !  ");
        }
}
