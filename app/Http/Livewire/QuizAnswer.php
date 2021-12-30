<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class QuizAnswer extends Component
{
    public $quiz,$exam ;
    public $quiz_answer = [];
    public $user_id;

    public function saveToSession($id){
        Session::put("q$id",$this->quiz_answer);
    }

    public function showSession(){
        dd(\request()->session());
    }

    public function render()
    {
        return view('livewire.quiz-answer');
    }
}
