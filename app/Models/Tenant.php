<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    public $guarded = [];

    public function gaurantor1()
    {
        return $this->belongsTo(Guarantor::class, 'guarantor1');
    }
    public function gaurantor2()
    {
        return $this->belongsTo(Guarantor::class, 'guarantor2');
    }
    public function gaurantor3()
    {
        return $this->belongsTo(Guarantor::class, 'guarantor3');
    }
}
