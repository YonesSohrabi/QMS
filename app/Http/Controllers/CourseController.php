<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Exam;
use App\Models\User;
use App\Models\UserCourse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $courses = Auth::user()->role !== "admin"
                            ? Auth::user()->courses
                            : Course::all();

        return view('pages.dashboard.course.index',compact('courses'));
    }


    public function create()
    {
        $this->authorize('create',Course::class);

        return view('pages.dashboard.course.create');
    }


    public function store(CourseRequest $request)
    {
        $this->authorize('create',Course::class);

        $data = $request->validated();

        $data['start_at'] = date('Y-m-d H:i:s', $request->start_at/1000);
        $data['end_at'] = date('Y-m-d H:i:s', $request->end_at/1000);

        $course = Course::create($data);
        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        $this->authorize('view',$course);

        $examsHeld = $course->exams()->where('start_at','<', Carbon::now())->get();

        $teacher = $course->getTeacher->first();
        if ($teacher){
            $teacher['coursesCount'] = count(getCoursesTeacher($teacher['id']));
            $teacher['studentCount'] = 0;
            foreach (getCoursesTeacher($teacher['id']) as $courseID)
                $teacher['studentCount'] += Course::find($courseID)->getStudents->count();
        }


        return view('pages.dashboard.course.show',compact(['course','teacher','examsHeld']));
    }

    public function edit(Course $course)
    {
        $this->authorize('update',$course);

        return view('pages.dashboard.course.edit', compact('course'));

    }

    public function update(CourseRequest $request, Course $course)
    {
        $this->authorize('update',$course);

        $data = $request->validated();

        $data['start_at'] = date('Y-m-d H:i:s', $request->start_at/1000);
        $data['end_at'] = date('Y-m-d H:i:s', $request->end_at/1000);

        Course::update($data);

        return back();

    }

    public function destroy(Course $course)
    {
        $this->authorize('delete',$course);

    }

    public function studentList(Course $course)
    {
        $this->authorize('view',$course);

        $users = User::all();
        $usersIC = $course->users;

        return view('pages.dashboard.course.students', compact('usersIC', ['users','course']));
    }

    public function addUserToCourse(Request $request,Course $course){

        $this->authorize('create',Course::class);

        $role = $request->role;
        if ($role === 'teacher' && count($course->getTeacher)){
            return back();
        }

        foreach ($request->get('name') as $userID){
            $course->users()->attach($userID,['role' => $role]);
        }

        return back();
    }

    public function deleteUserFromCourse(Course $course,User $user){

        $this->authorize('delete',Course::class);

        DB::table('course_user')
            ->where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->update(array('deleted_at' => DB::raw('NOW()')));

        return back();
    }

}
