<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'quiz_id', 'title', 'answer_1', 'answer_2', 'answer_3', 'answer_4', 'right_answer',
    ];

    public function quiz(){
        return $this->belongsTo('App\Models\Quiz');
    }
}
