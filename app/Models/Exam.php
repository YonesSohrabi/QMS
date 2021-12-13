<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'course_id',
        'start_at',
        'end_at',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function getInJalali($date){
        return verta($date)->format('Y/m/d');
    }

    public function getStartAt(){
        return $this->getInJalali($this->start_at);
    }

    public function getTimeExam()
    {
        return Carbon::create($this->end_at)->diffInMinutes(Carbon::create($this->start_at));
    }

    public function getStatus()
    {
        if(Carbon::now()->gt($this->end_at)) return 'خاتمه یافته';
        if(Carbon::now()->lte($this->start_at)) return 'شروع نشده';
        return 'در حال برگزاری';
    }
}
