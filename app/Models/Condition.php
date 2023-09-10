<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;
    public $guarded = [];

     // Define the many-to-many relationship with the Agreement model
     public function agreements()
     {
         return $this->belongsToMany(Agreement::class, 'agreement_condition')
             ->withTimestamps(); // Make sure to include timestamps
     }
 
}
