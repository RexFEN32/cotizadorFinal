<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerClassification extends Model
{
    use HasFactory;

    public function customer(){
        return $this->hasMany(Customer::class);
    }
}
