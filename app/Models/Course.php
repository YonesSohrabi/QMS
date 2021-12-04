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

    public function getStatus(){
        if ($this->status === 0) return 'شروع نشده';
        if ($this->status === 1) return 'در حال برگزاری';
        if ($this->status === 2) return 'اتمام دوره';
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
