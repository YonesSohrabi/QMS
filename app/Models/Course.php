<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

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
            ->whereNull('deleted_at')
            ->withTimestamps()
            ->withPivot('deleted_at');
    }

    public function usersWithTrashed(){
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot('deleted_at','role');
    }

    public function getStatus(){
        if ($this->status === 'p') return 'شروع نشده';
        if ($this->status === 's') return 'در حال برگزاری';
        if ($this->status === 'e') return 'اتمام دوره';
    }

    public function getTeacger() {
        return 0;
    }

    public function getStartAtInJalali(){
        return verta($this->start_at)->format('Y/m/d');
    }

    public function getEndAtInJalali(){
        return verta($this->end_at)->format('Y/m/d');
    }
}
