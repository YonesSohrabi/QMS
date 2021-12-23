<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'start_at',
        'end_at',
    ];

//    protected $with = [
//        'users'
//    ];

    public function users(){
        return $this->belongsToMany(User::class)
//            ->whereNull('deleted_at')
            ->withTimestamps()
            ->withPivot('deleted_at','role');
    }

    public function usersWithTrashed(){
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot('deleted_at','role');
    }

    public function getTeacher() {
        return $this->belongsToMany(User::class)
//            ->whereNull('deleted_at')
            ->wherePivot('role','=','teacher')
            ->withTimestamps()
            ->withPivot(['deleted_at','role']);
    }

    public function getStudents() {
        return $this->belongsToMany(User::class)
//            ->whereNull('deleted_at')
            ->wherePivot('role','=','student')
            ->withTimestamps()
            ->withPivot(['deleted_at','role','created_at']);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function getStartAtInJalali(){
        return verta($this->start_at)->format('Y/m/d');
    }

    public function getEndAtInJalali(){
        return verta($this->end_at)->format('Y/m/d');
    }

    public function getStatus()
    {
        if(Carbon::now()->gt($this->end_at)) return ['e','خاتمه یافته'];
        if(Carbon::now()->lte($this->start_at)) return ['p','شروع نشده'];
        return ['s','در حال برگزاری'];
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
