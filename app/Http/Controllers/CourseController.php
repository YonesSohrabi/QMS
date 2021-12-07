<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{

    public function index(Request $request)
    {
        if ($request->search)
            $courses = Course::where('name','LIKE',"%{$request->search}%")->get();
        if ($request->status)
            $courses = Course::where('status','LIKE',"%{$request->status}%")->get();
        if(!$request->status && !$request->search)
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
        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        return view('pages.dashboard.course.show');
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

    public function studentList($id)
    {
        $users = User::all();
        $usersIC = Course::find($id)->users;

        return view('pages.dashboard.course.students', compact('usersIC', ['users','id']));
    }

    public function addUserToCourse(Request $request,$id){
        $role = $request->get('role');
        foreach ($request->get('name') as $userID){
            Course::find($id)->users()->attach($userID,['role' => $role]);
        }
        return back();
    }

    public function deleteUserFromCourse($id,$user_id){

        DB::table('course_user')
            ->where('user_id', $user_id)
            ->where('course_id', $id)
            ->update(array('deleted_at' => DB::raw('NOW()')));

        return back();
    }


}
