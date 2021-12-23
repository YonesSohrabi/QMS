<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'family',
        'email',
        'nati_code',
        'role',
        'phone',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    protected $with = [
//        'courses'
//    ];

    public function courses(){
        return $this->belongsToMany(Course::class)
//            ->whereNull('deleted_at')
            ->withTimestamps()
            ->withPivot('deleted_at','role');
    }

    public function quizzes(){
        return $this->belongsToMany(Quiz::class)
//            ->whereNull('deleted_at')
            ->withTimestamps()
            ->withPivot(['user_id','user_designer','answer','score']);
    }

    public function coursesWithTrashed(){
        return $this->belongsToMany(Course::class)
            ->withTimestamps()
            ->withPivot(['deleted_at']);
    }

    public function getRole(){
        if ($this->role === 'student') return 'دانشجو';
        if ($this->role === 'teacher') return 'استاد';
        if ($this->role === 'admin') return 'ادمین';
    }

    public function getCreateAtInJalali(){
        return verta($this->created_at)->format('Y/m/d');
    }

    public function teacherQuizzes(){
        return $this->belongsToMany(Quiz::class)
//            ->whereNull('deleted_at')
            ->wherePivot('user_designer','=','1')
            ->withTimestamps()
            ->withPivot(['user_designer','answer','score']);
    }
}
