<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exam::create([
            'title' => 'آزمون الکوئنت',
            'description' => '<p>آزمون اول لاراول<br>موفق باشین دوستان </p>',
            'course_id' => '1',
            'start_at' => '2021-12-14 17:20:00',
            'end_at' => '2021-12-14 19:30:00',
        ]);

        Exam::create([
            'title' => 'آزمون احراز هویت',
            'description' => '<p>آزمون دوم لاراول<br>موفق باشین دوستان </p>',
            'course_id' => '1',
            'start_at' => '2021-12-20 17:20:00',
            'end_at' => '2021-12-20 19:30:00',
        ]);

        Exam::create([
            'title' => 'آزمون ORM',
            'description' => '<p>آزمون سوم لاراول<br>موفق باشین دوستان </p>',
            'course_id' => '1',
            'start_at' => '2022-01-25 17:20:00',
            'end_at' => '2022-01-25 19:30:00',
        ]);
    }
}
