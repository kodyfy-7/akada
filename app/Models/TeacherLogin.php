<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TeacherLogin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'teacher';

    protected $fillable = [
        'employee_id', 'password', 'username',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /*public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function coupon_codes()
    {
        return $this->hasMany(AdminCouponCode::class);
    }*/

    public function getRouteKeyName()
    {
        return 'username';
    }
}
