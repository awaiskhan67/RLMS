<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // Property.php
    public function pcategory()
    {
        return $this->belongsTo(Pcategory::class, 'category_id');
    }


    public function user(){
        return $this->belongsTo(Pcategory::class , 'category_id');
    }
}
