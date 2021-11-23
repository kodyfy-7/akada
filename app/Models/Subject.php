<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'subject_slug';
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function result_details()
    {
        return $this->hasMany(ResultDetail::class);
    }

    public function classroom_subjects()
    {
        return $this->hasMany(ClassroomSubject::class);
    }

    /*public function classroom_subjects()
    {
        return $this->hasMany(ClassroomSubject::class);
    }*/
}
