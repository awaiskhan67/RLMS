<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function property(){
        return $this->belongsTo(Property::class , 'property_id');
    }

    public function tenant(){
        return $this->belongsTo(Tenant::class , 'tenant_id');
    }

    // public function invoice(){
    //     return $this->belongsTo(Invoice::class , 'invoice_id');
    // }

    public function agreement(){
        return $this->belongsTo(Agreement::class , 'agreement_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'entry_id');
    }

    //this is the invoice relations
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class,'payment_invoices')->withTimestamps();
    }    

    
}
