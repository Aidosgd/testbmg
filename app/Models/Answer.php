<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'id',
        'question_id',
        'title',
        'status'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
