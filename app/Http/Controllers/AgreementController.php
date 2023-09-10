<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Http\Request;
use App\Models\Agreement;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Condition;
use Illuminate\Support\Facades\Auth;




class AgreementController extends Controller
{
    //

    public function index(){
        $agreement = Agreement::orderby('id','desc')->get();
        $lastSerialNo = Agreement::max('serial_no') ?? 0;
        $property = Property::all();
        $tenant = Tenant::all();
        $condition = Condition::all();
        return view ('Agreement', compact('agreement','lastSerialNo','property','tenant','condition'));
    }

    public function store(Request $request){
        $request->validate([
            'serial' => 'required',
            'agreement_no' => 'required|unique:agreements',
            'agreement_name' => 'required',
            'property_id' => 'required',
            'tenant_id' => 'required',
            'property_rent' => 'required|numeric',
            'security_deposit' => 'required|numeric',
            'start_date' => 'required|date',
            'period' => 'required|integer',
            'increment_rate' => 'required|numeric',
            'description' => 'required|string|max:255',
            'payment_frequency' => 'required',
            'attachment' => 'required|mimes:pdf,doc,docx|max:2048', // Adjust max size as needed

            'late_fee_active' =>'required|integer',
            'late_fee_days'   => $request->input('late_fee_active') == 0 ? 'nullable|numeric' : 'required|numeric',
            'late_fee_amount' => $request->input('late_fee_active') == 0 ? 'nullable|numeric' : 'required|numeric',
        ]);
        
        $agreement = new Agreement;
        $agreement->serial_no = $request->serial;
        $agreement->agreement_no = $request->agreement_no;
        $agreement->agreement_name = $request->agreement_name;
        $agreement->property_id = $request->property_id;
        $agreement->tenant_id = $request->tenant_id;
        $agreement->rent = $request->property_rent;
        $agreement->security_money = $request->security_deposit;
        $agreement->start_date = $request->start_date;
        $agreement->period = $request->period;
        $agreement->increment = $request->increment_rate;
        $agreement->description = $request->description;
        $agreement->payment_frequency = $request->payment_frequency;

        $agreement->late_fee_active = $request->late_fee_active;
        $agreement->late_fee_days = $request->late_fee_days;
        $agreement->late_fee_amount = $request->late_fee_amount;

        $agreement->entry_id = Auth::user()->id;
        
        // Working with attachment
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $ex = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ex;
            $file->move(public_path('attachments'), $filename);
            $agreement->attachment = $filename;
        }

        $startDate = \Carbon\Carbon::parse($request->start_date);
        $paymentFrequency = $request->payment_frequency;
        
        if ($paymentFrequency === 'monthly') {
            $nextRentDue = $startDate->addMonth();
        } elseif ($paymentFrequency === 'quarterly') {
            $nextRentDue = $startDate->addMonths(3);
        } elseif ($paymentFrequency === 'half_yearly') {
            $nextRentDue = $startDate->addMonths(6);
        } elseif ($paymentFrequency === 'yearly') {
            $nextRentDue = $startDate->addYear();
        } else {
            // Handle other cases or default behavior
        }
        
        $agreement->next_rent_due = $nextRentDue;
        
        $agreement->save();
        // Attach selected conditions to the agreement
        $selectedConditions = $request->input('conditions', []);
        $agreement->conditions()->attach($selectedConditions);
        
        return back()->with("success", "Agreement added successfully!");
        
    }


    public function edite(Request $request , $id){
        $agreement = Agreement::find($id);
        $property = Property::all();
        $tenant = Tenant::all();
        $condition = Condition::all();
         // Retrieve the last serial number
        return view('AgreementEdite', compact('agreement','property','tenant','condition'));
    }

    public function update(Request $request){

        $agreement = Agreement::find($request->id);

        if ($agreement->status != 0) {
            // Handle the case where the agreement is active
            return back()->with("warning", "Agreement is already active now , you can't change anythings.");
        }

        if (!$agreement) {
            // Handle the case where the agreement doesn't exist
            return back()->with("warning", "Agreement not found.");
        }

        $request->validate([
            'serial' => 'required',
            'agreement_no' => 'required|unique:agreements,agreement_no,' . $request->id,
            'agreement_name' => 'required',
            'property_id' => 'required',
            'tenant_id' => 'required',
            'property_rent' => 'required|numeric',
            'security_deposit' => 'required|numeric',
            'start_date' => 'required|date',
            'period' => 'required|integer',
            'increment_rate' => 'required|numeric',
            'description' => 'required|string|max:255',
            'payment_frequency' => 'required',
            'attachment' => 'nullable|mimes:pdf,doc,docx|max:2048', // Adjust max size as needed

            'late_fee_active' =>'required|integer',
            'late_fee_days'   => $request->input('late_fee_active') == 0 ? 'nullable|numeric' : 'required|numeric',
            'late_fee_amount' => $request->input('late_fee_active') == 0 ? 'nullable|numeric' : 'required|numeric',
        ]);

        $agreement->agreement_no = $request->agreement_no;
        $agreement->agreement_name = $request->agreement_name;
        $agreement->property_id = $request->property_id;
        $agreement->tenant_id = $request->tenant_id;
        $agreement->rent = $request->property_rent;
        $agreement->security_money = $request->security_deposit;
        $agreement->start_date = $request->start_date;
        $agreement->period = $request->period;
        $agreement->increment = $request->increment_rate;
        $agreement->description = $request->description;
        $agreement->payment_frequency = $request->payment_frequency;

        $agreement->late_fee_active = $request->late_fee_active;
        $agreement->late_fee_days = $request->late_fee_days;
        $agreement->late_fee_amount = $request->late_fee_amount;

        $startDate = \Carbon\Carbon::parse($request->start_date);
        $paymentFrequency = $request->payment_frequency;

        if ($paymentFrequency === 'monthly') {
            $nextRentDue = $startDate->addMonth();
        } elseif ($paymentFrequency === 'quarterly') {
            $nextRentDue = $startDate->addMonths(3);
        } elseif ($paymentFrequency === 'half_yearly') {
            $nextRentDue = $startDate->addMonths(6);
        } elseif ($paymentFrequency === 'yearly') {
            $nextRentDue = $startDate->addYear();
        } else {
            // Handle other cases or default behavior
        }

        $agreement->next_rent_due = $nextRentDue;

        // Working with attachment
        if ($request->hasFile('attachment')) {

            // Delete the existing attachment if it exists
            if ($agreement->attachment) {
                $existingAttachmentPath = public_path('attachments/' . $agreement->attachment);
                if (file_exists($existingAttachmentPath)) {
                    unlink($existingAttachmentPath);
                }
            }


            $file = $request->file('attachment');
            $ex = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ex;
            $file->move(public_path('attachments'), $filename);
            $agreement->attachment = $filename;
        }

        // Save the updated agreement
        $agreement->save();

        // Attach selected conditions to the agreement
        $selectedConditions = $request->input('conditions', []);
        $agreement->conditions()->sync($selectedConditions);

        return redirect()->route('agreement')->with("success", "Agreement updated successfully!");

    }

    public function p_show(Request $request, $id){
        $prop = Property::findOrFail($id);
        return response()->json($prop);
    }

    public function t_show(Request $request, $id){
        $tenant = Tenant::findOrFail($id);
        return response()->json($tenant);
    }


    public function delete(Request $request, $id)
    {
        $agreement = Agreement::findOrFail($id);
    
        if ($agreement->status != 0) {
            return back()->with("warning", "You can't delete this agreement, because it is now active!");
        }
    
        // Delete the attachment file
        if ($agreement->attachment) {
            $attachmentPath = public_path('attachments/' . $agreement->attachment);
            if (file_exists($attachmentPath)) {
                unlink($attachmentPath);
            }
        }
    
        // Detach associated conditions
        $agreement->conditions()->detach();
    
        // Delete the agreement
        $agreement->delete();
    
        return redirect()->route('agreement')->with("warning", "Agreement deleted successfully!");
    }


    //this is the agreement profile section
    public function agreement_profile(Request $request, $id){
        $agreement = Agreement::find($id);

        // Retrieve the conditions associated with this agreement
        $conditionIds = DB::table('agreement_condition')
        ->where('agreement_id', $agreement->id)
        ->pluck('condition_id');

        // Fetch the conditions using the retrieved condition IDs
        $conditions = Condition::whereIn('id', $conditionIds)->get();

        // Calculate the total invoice amount for the agreement (with null checks)
        $totalInvoiceAmount = $agreement->invoices ? $agreement->invoices->sum('total_amount') : 0;


        return view('agreementProfile', compact('agreement', 'conditions', 'totalInvoiceAmount'));
    }
    


}
