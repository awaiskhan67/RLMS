<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['next_rent_due'];

    // Define the many-to-many relationship with the Condition model
    public function conditions()
    {
        return $this->belongsToMany(Condition::class, 'agreement_condition')
            ->withTimestamps(); // Make sure to include timestamps
    }

    //define the propert & tenat relation to the agreement 
    public function property(){
        return $this->belongsTo(Property::class , 'property_id');
    }

    public function tenant(){
        return $this->belongsTo(Tenant::class , 'tenant_id');
    }

    // Property.php

    public function pcategory()
    {
        return $this->belongsTo(Pcategory::class, 'category_id');
    }



    // This function updates the next rent due date based on payment frequency
    public function updateNextRentDue()
    {
        if ($this->next_rent_due) {
            $currentNextRentDue = $this->next_rent_due;
            $paymentFrequency = $this->payment_frequency;

            if ($paymentFrequency === 'monthly') {
                $newNextRentDue = $currentNextRentDue->addMonth();
            } elseif ($paymentFrequency === 'quarterly') {
                $newNextRentDue = $currentNextRentDue->addMonths(3);
            } elseif ($paymentFrequency === 'half_yearly') {
                $newNextRentDue = $currentNextRentDue->addMonths(6);
            } elseif ($paymentFrequency === 'yearly') {
                $newNextRentDue = $currentNextRentDue->addYear();
            }

            $this->next_rent_due = $newNextRentDue;
            $this->save();
        }
    }

    // Other methods and relationships...


}
