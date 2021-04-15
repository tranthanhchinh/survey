<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quiz';
    public function questionGroup(){
        return $this->belongsTo(QuestionGroup::class);
    }

    public function quizAnwser(){
        return $this->hasMany(QuizAnwser::class, 'quiz_id');
    }
}
