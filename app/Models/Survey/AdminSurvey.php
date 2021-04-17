<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class AdminSurvey extends Model
{
    use HasFactory;
    use HasSlug;
    protected $table = 'tp_survey';
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function questionGroup(){
        return $this->hasMany(AdminQuestionGroup::class,'tp_survey_id');
    }
}
