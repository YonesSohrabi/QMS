<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Quiz;
use App\Models\User;
use App\Policies\CoursePolicy;
use App\Policies\ExamPolicy;
use App\Policies\QuizPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Course::class => CoursePolicy::class,
        Exam::class => ExamPolicy::class,
        Quiz::class => QuizPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
