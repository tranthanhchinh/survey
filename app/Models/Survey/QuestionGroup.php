<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionGroup extends Model
{
    use HasFactory;
    protected $table = 'question_group';
    public function survey(){
        return $this->belongsTo(Survey::class);
    }

    public function quiz(){
        return $this->hasMany(Quiz::class, 'group_id');
    }
}
