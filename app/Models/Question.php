<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question','answerkey'];
    
    public $timestamps = true;
    
    public function answers(){
        return $this->hasMany(Answer::class, 'question_id');
    }
}
