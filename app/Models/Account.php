<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['firstname','lastname','cnic','email','password','gender'];
    
    public $timestamps = true;

    public function result(){
        return $this->hasMany(Result::class,'account_id');
    }
}
