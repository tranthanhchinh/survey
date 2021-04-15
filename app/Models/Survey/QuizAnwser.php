<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnwser extends Model
{
    use HasFactory;
    protected $table = 'answer';
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
