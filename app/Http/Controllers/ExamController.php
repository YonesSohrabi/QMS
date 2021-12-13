<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    public function index()
    {
        //
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
        return redirect()->route('courses.index');
    }


    public function show(Exam $exam)
    {
        //
    }


    public function edit(Exam $exam)
    {
        //
    }


    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //
    }


    public function destroy(Exam $exam)
    {
        //
    }
}
