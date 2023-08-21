<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserZone extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
