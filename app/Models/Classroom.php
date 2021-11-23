<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'classroom_slug';
    }

    public function classroom_subjects()
    {
        return $this->hasMany(ClassroomSubject::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
    
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
