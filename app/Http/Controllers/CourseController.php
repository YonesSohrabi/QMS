<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return view('pages.dashboard.course.index',compact('courses'));
    }


    public function create()
    {
        return view('pages.dashboard.course.create');
    }


    public function store(CourseRequest $request)
    {
        $data = $request->validated();

        $data['start_at'] = date('Y-m-d H:i:s', $request->start_at/1000);
        $data['end_at'] = date('Y-m-d H:i:s', $request->end_at/1000);

        $course = Course::create($data);
        return back();
    }


    public function edit(Course $course)
    {
        //
    }

    public function update(Request $request, Course $course)
    {
        //
    }

    public function destroy(Course $course)
    {
        //
    }
}
