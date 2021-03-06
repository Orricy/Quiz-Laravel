<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'title',
    ];

    public function questions(){
        return $this->hasmany('App\Models\Question');
    }
}
