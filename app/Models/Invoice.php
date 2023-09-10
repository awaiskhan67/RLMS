<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Invoice extends Model
{
    use HasFactory;
    public $guarded = [];
    
    const STATUS_UNPAID = 'unpaid';    
    const STATUS_PAID = 'paid'; 
    const STATUS_PARTPAID = 'partially_paid'; 
    public function agreement()
    {
        return $this->belongsTo(Agreement::class , 'agreement_id');
    }

    // Add logic to calculate total amount with late fee
    public function calculateTotalAmount()
    {
        return $this->rent_amount + $this->late_fee_amount;
    }

    //this is the agreement which is liked with the invoice 
    public function invoiceAgree(){
        return $this->belongsTo(Agreement::class , 'agreement_id');
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class,'payment_invoices')->withTimestamps();
    }

}
