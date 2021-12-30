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
use Illuminate\Support\Facades\Session;
use function MongoDB\BSON\toJSON;

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
        $quizzes = $exam->quizzes()->with(['users','answers'])->get();
        $course = $exam->course;

        $teacher = collect($course->with('users')->get()->first()->users)
            ->filter(function ($x){
                if ($x->pivot->role === 'teacher') return $x;
            });

        $teacher = $teacher->first();
        $user = auth()->user()->id;

        $studentsInExam = call_user_func_array(
            'array_merge',
            $quizzes->map(function ($x){
                return $x->users;
            })->unique('id')->toArray()
        );

        $userAttended = ceil(count(auth()->user()->quizzes()
                ->wherePivot('user_designer','=',0)->get())/count($quizzes));

        return view('pages.dashboard.exam.show', compact([
            'exam',
            'course',
            'quizzes',
            'studentsInExam',
            'user',
            'teacher',
            'userAttended',
        ]));
    }


    public function edit(Exam $exam)
    {
        $teacherQuizzes = User::find(auth()->user()->id)->teacherQuizzes;
        $quizzesExam = $exam->quizzes;
        return view('pages.dashboard.exam.edit',compact([
            'exam',
            'teacherQuizzes',
            'quizzesExam'
        ]));
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

    public function addQuiz(Request $request, Exam $exam)
    {
        switch ($request->type){
            case 'new':
                return $this->addNewQuiz($request,$exam);
            case 'bank':
                return $this->addQuizFromBank($request,$exam);
            default:
                abort(404);
        }

    }

    public function addQuizFromBank(Request $request ,Exam $exam)
    {

        foreach ($request->title as $quizID){
            $exam->quizzes()->attach(
                $quizID,
                ['score' => $request->score]
            );
        }

        return back();
    }

    public function addNewQuiz(Request $request ,Exam $exam)
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

    public function viewQuiz(Exam $exam)
    {
        $quizzes = $exam->quizzes()->with(['users','answers'])->paginate(1);

//        dd($users);
        return view('pages.dashboard.exam.quiz', compact(['exam','quizzes']));
    }

    public function sendQuiz(Exam $exam)
    {

        $userID = auth()->user()->id;
        $quizID = $exam->quizzes->map(function ($x){ return $x->id;});

        foreach ($quizID as $id){
            if (Session::has("q$id")){

                $answer = Session::get("q$id");
                if (Quiz::where('id','=',$id)->first()->type === 'multiple'){
                    $answer = json_encode($answer);
                }

                DB::table('quiz_user')->insert([
                    'user_id' => $userID,
                    'quiz_id' => $id,
                    'answer' => $answer,
                ]);

                Session::forget("q$id");
            }
        }
    }
}
