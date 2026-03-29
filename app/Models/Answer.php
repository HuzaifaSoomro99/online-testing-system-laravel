<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answers','question_id'];
    
    public $timestamps = true;

    public function question(){
        return $this->belongsTo(Question::class,'question_id');
    }

}
