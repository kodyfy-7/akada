<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
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

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    
    
}
