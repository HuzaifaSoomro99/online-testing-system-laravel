<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['account_id','totalquestions','correct','wrong','obtainmarks','percentage','status','date','duration','no_of_attempts'];
    
    public $timestamps = true;

    public function account(){
        return $this->belongsTo(Account::class, 'account_id');
    }

}
