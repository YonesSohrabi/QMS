<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Course $course)
    {
        $isUserInCourse = in_array($user->id,$course->users->pluck('id')->toArray());
        return $this->isAdmin($user) || $isUserInCourse ;
    }


    public function create(User $user)
    {
        return $this->isAdmin($user);
    }


    public function update(User $user, Course $course)
    {
        return $this->isAdmin($user) || $this->isTeacher($user,$course);
    }


    public function delete(User $user)
    {
        return $this->isAdmin($user);
    }


    public function isAdmin(User $user)
    {
        return $user->role === 'admin';
    }

    public function isTeacher(User $user , Course $course)
    {
        if ($this->isAdmin($user)){
            return true;
        }

        return $user->id === $course->getTeacher()->first()->id;
    }

    public function isStudent(User $user , Course $course)
    {
        return !$this->isTeacher($user ,$course);
    }


}
