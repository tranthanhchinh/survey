<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminQuiz extends Model
{
    use HasFactory;
    protected $table = 'tp_quiz';
    public function questionGroup(){
        return $this->belongsTo(AdminQuestionGroup::class);
    }

    public function quizAnwser(){
        return $this->hasMany(AdminQuizAnwser::class, 'tp_quiz_id');
    }
}
