<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companyprofile;
use App\Models\Cwallet;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    //
    public function index(){
        $user = Companyprofile::first();
        $wallet = Cwallet::first();
        return view ('Company', compact('user','wallet'));
    }

    public function image_update(Request $request)
    {
        $request->validate([
            'logo' => ['required', 'mimes:jpg,png,jpeg', 'max:2048'],
        ]);
    
        $Photo = time() . '_' . $request->logo->getClientOriginalName() . '.' . $request->logo->extension();
        $request->logo->move(public_path('uploads'), $Photo);

        // Get the currently authenticated user
        $user = Companyprofile::find($request->id);

        if ($user->logo && \file_exists(public_path('uploads/' . $user->logo))) {
            unlink(public_path('uploads/' . $user->logo));
        }

    
        // Update the profile attribute with the new image file name
        $user->logo = $Photo;
        $user->save();
    
        return back()->with('success', "Logo changed successfully!");
    }

    public function update(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companyprofiles,email,' . $request->id],
        
            'contact_number' => ['required', 'string', 'max:255',  'unique:companyprofiles,phone,' . $request->id],
            'contact_number2' => ['nullable', 'string', 'max:255', 'unique:companyprofiles,phone2,' . $request->id],
            'address' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],

            'website' => ['nullable', 'max:255'],
            'twitter' => ['nullable', 'max:255'],
            'instagram' => ['nullable', 'max:255'],
            'facebook' => ['nullable', 'max:255'],
        ]);

        $user = Companyprofile::find($request->id);

        $user->update([
            'name' => $request->name ,
            'email' => $request->email,
            'phone' => $request->contact_number,
            'phone2' => $request->contact_number2,
            'address' => $request->address,
            'description' => $request->description,
            'website' => $request->website,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
        ]);

        return back()->with('success','Compnay information updated scuccessfully !');


    }
    
    public function currency_update(Request $request){

        $carr = Cwallet::first();

        if(!isset($carr)){

            $currency = new Cwallet;
            $currency->currency = $request->currency;
            $currency->save();
            return back()->with('success' , 'Currency added successfully !');

        }else{

            $currency = Cwallet::find($request->id);
            $currency->currency = $request->currency;
            $currency->save();
            return back()->with('success' , 'currency updated added successfully !');
        }

           
    }

    public function inamount_update(Request $request){

        $currency = Cwallet::find($request->id);

        $currency->initial_blance = $request->amount;
        $currency->amount = $request->amount;
        $currency->save();
        return back()->with('success' , 'Inital blance added successfully !');

    }

}
