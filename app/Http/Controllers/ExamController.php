<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use Illuminate\Http\Request;

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
        return view('pages.dashboard.exam.edit',compact('exam'));
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
}
