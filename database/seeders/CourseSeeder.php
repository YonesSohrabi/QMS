<?php

namespace Database\Seeders;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'آموزش لاراول',
            'description' => 'توضیحات دوره لاراول',
            'start_at' => Carbon::create(2021,12,15,8,0,0),
            'end_at' => Carbon::create(2022,1,15,8,0,0),
        ]);

        Course::create([
            'name' => 'آموزش جنگو',
            'description' => 'توضیحات دوره جنگو',
            'start_at' => Carbon::create(2022,1,15,8,0,0),
            'end_at' => Carbon::create(2022,2,15,8,0,0),
        ]);

        Course::create([
            'name' => 'آموزش پایتون',
            'description' => 'توضیحات دوره پایتون',
            'start_at' => Carbon::create(2022,2,15,8,0,0),
            'end_at' => Carbon::create(2022,3,15,8,0,0),
        ]);

        Course::create([
            'name' => 'آموزش جاوا اسکریپت',
            'description' => 'توضیحات جاوا اسکریپت',
            'start_at' => Carbon::create(2022,3,15,8,0,0),
            'end_at' => Carbon::create(2022,4,15,8,0,0),
        ]);

        Course::create([
            'name' => 'آموزش ری اکت',
            'description' => 'توضیحات ری اکت',
            'start_at' => Carbon::create(2022,4,15,8,0,0),
            'end_at' => Carbon::create(2022,5,15,8,0,0),
        ]);
    }
}
