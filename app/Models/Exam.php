<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory , SoftDeletes;

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

    public function quizzes(){
        return $this->belongsToMany(Quiz::class)
//            ->whereNull('deleted_at')
            ->withTimestamps()
            ->withPivot(['score']);
    }

    public function getInJalali($date){
        $dateFormat = verta($date)->format('Y/m/d');
        $timeFormat = verta($date)->format('g:i a');
        return [
            'date' => $dateFormat,
            'time' => $timeFormat,
        ];
    }

    public function getStartAt(){
        return $this->getInJalali($this->start_at);
    }

    public function getEndAt(){
        return $this->getInJalali($this->end_at);
    }

    public function getTimeExam()
    {
        return Carbon::create($this->end_at)->diffInMinutes(Carbon::create($this->start_at));
    }

    public function getStatus()
    {
        if(Carbon::now()->gt($this->end_at)) return ['ended','خاتمه یافته'];
        if(Carbon::now()->lte($this->start_at)) return ['notStarted','شروع نشده'];
        return ['started','در حال برگزاری'];
    }
}
