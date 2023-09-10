<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companyprofile;
use App\Models\Condition;
use Illuminate\Support\Facades\Auth;

class ConditionController extends Controller
{
    //

    public function index(){
        $conditions = Condition::orderby('id','desc')->get();
        return view ('Conditions', compact('conditions'));
    }


    public function store(Request $request){
    
        $request->validate([
            'condition' => ['required', 'max:255'],
        ]);

        $property = new Condition;
        $property->condition = $request->condition;
        $property->save();
        return back()->with("success", "Condition added successfully !");
    }


    public function delete(Request $request , $id){
        $ex = Condition::find($id);
        $ex->delete();
        return back()->with("warning", "Condition deleted successfuly !  ");
    }

    
}
