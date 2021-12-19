<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::create([
            'type' => 'solid',
            'quiz_title' => 'سوال اول',
            'quiz_text' => '<p>متن مربوط به سوال اول ، این سوال تشریحی است .</p>'
        ]);

        Quiz::create([
            'type' => 'multiple',
            'quiz_title' => 'سوال دوم',
            'quiz_text' => '<p>متن مربوط به سوال دوم ، این سوال 3 گزینه ای است .</p>'
        ]);


        Quiz::create([
            'type' => 'multiple',
            'quiz_title' => 'سوال سوم',
            'quiz_text' => '<p>متن مربوط به سوال سوم</p><p>این سوال از دو جای خالی .... و ..... تشکیل شده است ، گزینه صحیح را انتخاب کنید.</p>'
        ]);

        Quiz::create([
            'type' => 'multiple',
            'quiz_title' => 'سوال چهارم',
            'quiz_text' => '<p>متن مربوط به سوال چهارم، این سوال صحیح غلط است</p>'
        ]);

        Quiz::create([
            'type' => 'solid',
            'quiz_title' => 'سوال پنجم',
            'quiz_text' => '<p>متن مربوط به سوال پنجم ، این سوال از یک جای خالی .... تشکیل شده است ، در کادر جواب داده شود </p>'
        ]);

        Quiz::create([
            'type' => 'multiple',
            'quiz_title' => 'سوال ششم',
            'quiz_text' => '<p>متن مربوط به سوال ششم ، این سوال 5 گزینه ای است و دو پاسخ صحیح دارد .</p>'
        ]);
    }
}
