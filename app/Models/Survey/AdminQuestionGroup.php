<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminQuestionGroup extends Model
{
    use HasFactory;
    protected $table = 'tp_question_group';
    public function survey(){
        return $this->belongsTo(AdminSurvey::class);
    }

    public function quiz(){
        return $this->hasMany(AdminQuiz::class, 'tp_question_group_id');
    }
}
