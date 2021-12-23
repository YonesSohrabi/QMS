<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'type',
        'quiz_title',
        'quiz_text',
        'quiz_answer_text'
    ];

    public function users(){
        return $this->belongsToMany(User::class)
//            ->whereNull('deleted_at')
            ->withTimestamps()
            ->withPivot(['user_id','user_designer','answer','score']);
    }

    public function exams(){
        return $this->belongsToMany(Exam::class)
//            ->whereNull('deleted_at')
            ->withTimestamps()
            ->withPivot(['score','delete_at']);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
//            ->whereNull('deleted_at')
    }
}
