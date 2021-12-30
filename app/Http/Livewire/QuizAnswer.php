<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class QuizAnswer extends Component
{
    public $quiz,$exam,$score ;
    public $quiz_answer = [];
    public $user_id;

    public function mount(){
        $this->user_id = request()->user_id;
    }
    public function saveToSession($quiz_id){
        Session::put("q$quiz_id",$this->quiz_answer);
    }

    public function saveScore(Quiz $quiz){
        DB::table('quiz_user')
            ->where('user_id',+$this->user_id)
            ->where('quiz_id',$quiz->id)
            ->update([
                'score' => +$this->score
            ]);
    }

    public function showSession(){
        dd(\request()->session());
    }

    public function render()
    {
        return view('livewire.quiz-answer');
    }
}
