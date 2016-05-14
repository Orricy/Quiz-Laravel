<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'user_id', 'value',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
