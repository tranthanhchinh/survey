<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminQuizAnwser extends Model
{
    use HasFactory;
    protected $table = 'tp_answer';
    public function quiz(){
        return $this->belongsTo(AdminQuiz::class);
    }
}
