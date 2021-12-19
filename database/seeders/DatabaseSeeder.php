<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(ExamSeeder::class);
        $this->call(QuizSeeder::class);
        $this->call(AnswerSeeder::class);
    }
}
