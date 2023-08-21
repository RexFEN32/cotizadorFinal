<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    //protected $guarded = ['id', 'created_at', 'updated_at'];

    /** Relaciones uno a muchos */
       
    public function contact(){
        return $this->hasMany(Contact::class);
    }

    public function quotations(){
        return $this->hasMany(Quotation::class);
    }

    /** Relaciones uno a uno */

    public function sector(){
        return $this->belongsTo(Sector::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer_classification(){
        return $this->belongsTo(CustomerClassification::class);
    }

    public function customer_type(){
        return $this->belongsTo(CustomerType::class);
    }
    
}
