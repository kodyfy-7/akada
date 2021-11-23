<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'result_slug';
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function result_details()
    {
        return $this->hasMany(ResultDetail::class);
    }
    
    public function first_assessment_scores()
    {
        return $this->hasMany(FirstAssessmentScore::class);
    }
    
    public function second_assessment_scores()
    {
        return $this->hasMany(SecondAssessmentScore::class);
    }
    
    public function exam_scores()
    {
        return $this->hasMany(ExamScore::class);
    }
}
