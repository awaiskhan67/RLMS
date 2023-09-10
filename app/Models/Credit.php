<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;
    public $guarded = [];

    public function tenant()
    {
        return $this->belongsToMany(Tenant::class, 'tenant_id')
            ->withTimestamps(); // Make sure to include timestamps
    }

}
