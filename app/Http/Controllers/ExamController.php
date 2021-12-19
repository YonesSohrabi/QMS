<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{

    public function index(Exam $exam)
    {

    }


    public function create(Course $course)
    {
        return view('pages.dashboard.exam.create',compact('course'));
    }


    public function store(StoreExamRequest $request)
    {
        $data = $request->validated();

        $data['start_at'] = date('Y-m-d H:i:s', $request->start_at/1000);
        $data['end_at'] = date('Y-m-d H:i:s', $request->end_at/1000);
        Exam::create($data);
        return redirect()->route('courses.show',$data['course_id']);
    }


    public function show(Exam $exam)
    {
        //
    }


    public function edit(Exam $exam)
    {
        $teacherQuizzes = User::find(auth()->user()->id)->teacherQuizzes;
        return view('pages.dashboard.exam.edit',compact(['exam','teacherQuizzes']));
    }


    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $data = $request->validated();
        $data['start_at'] = date('Y-m-d H:i:s', $request->start_at/1000);
        $data['end_at'] = date('Y-m-d H:i:s', $request->end_at/1000);
        $exam->update($data);

        return back();
    }


    public function destroy(Course $course,Exam $exam)
    {
        $exam->delete();

        return back();
    }

    public function examsList(Course $course)
    {
        return view('pages.dashboard.exam.index',compact('course'));
    }

    public function addNewQuiz(Request $request, Exam $exam)
    {
        $quiz_data = $request->except('quiz_answer');
        $answer_data = $request->get('quiz_answer');

        if (is_array($answer_data) && count($answer_data)>1){

            $quiz_data['type'] = 'mulitple';

            foreach ($answer_data['text'] as $key => $value){
                in_array($key,$answer_data['isCorrect'])
                    ? $answer_data['text'][$key] = ['answer_text' => $value ,'is_correct' => 1]
                    : $answer_data['text'][$key] = ['answer_text' => $value ,'is_correct' => 0];
            }

            $answer_data = $answer_data['text'];

        }else{
            $quiz_data['type'] = 'solid';
        }

        DB::beginTransaction();

        $quiz = Quiz::create($quiz_data);
        $answer = true;
        if (is_array($answer_data) && count($answer_data)>1){
            $answer = false;
            foreach ($answer_data as $answer)
                Answer::query()->create([
                    'answer_text' => $answer['answer_text'],
                    'is_correct' => $answer['is_correct'],
                    'quiz_id' => $quiz->id,
                ]);
            $answer = true;
        }

        $quiz->users()->attach(
            auth()->user()->id,
            ['user_designer' => 1]
        );

        $quiz->exams()->attach(
            $exam->id,
            ['score' => $quiz_data['score'] ]
        );

        $quiz && $answer ? DB::commit() : DB::rollBack();

        return back();
    }

    public function addQuizFromBank()
    {
        dd('salam');
    }
}
