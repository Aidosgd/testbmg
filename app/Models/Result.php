<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';

    protected $fillable = [
        'id',
        'user_id',
        'questions',
        'right_answer',
        'wrong_answer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
