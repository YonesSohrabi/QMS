<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::create([
            'answer_text' => 'گزینه 1 مربوط به سوال دوم',
            'is_correct' => 0,
            'quiz_id' => 2,
        ]);

        Answer::create([
            'answer_text' => 'گزینه 2 مربوط به سوال دوم و گزینه صحیح',
            'is_correct' => 1,
            'quiz_id' => 2,
        ]);

        Answer::create([
            'answer_text' => 'گزینه 3 مربوط به سوال دوم',
            'is_correct' => 0,
            'quiz_id' => 2,
        ]);

        Answer::create([
            'answer_text' => 'گزینه درست - درست مربوط به سوال سوم ، این گزینه جواب صحیح است',
            'is_correct' => 1,
            'quiz_id' => 3,
        ]);

        Answer::create([
            'answer_text' => 'گزینه غلط - درست مربوط به سوال سوم',
            'is_correct' => 0,
            'quiz_id' => 3,
        ]);

        Answer::create([
            'answer_text' => 'گزینه غلط - غلط مربوط به سوال سوم',
            'is_correct' => 0,
            'quiz_id' => 3,
        ]);

        Answer::create([
            'answer_text' => 'گزینه درست - غلط مربوط به سوال سوم',
            'is_correct' => 0,
            'quiz_id' => 3,
        ]);

        Answer::create([
            'answer_text' => 'سوال 4 - صحیح',
            'is_correct' => 0,
            'quiz_id' => 4,
        ]);

        Answer::create([
            'answer_text' => 'سوال 4 - غلط - این گزینه صحیح است',
            'is_correct' => 1,
            'quiz_id' => 4,
        ]);

        Answer::create([
            'answer_text' => 'گزینه 1 مربوط به سوال شش',
            'is_correct' => 0,
            'quiz_id' => 6,
        ]);

        Answer::create([
            'answer_text' => 'گزینه 2 مربوط به سوال شش و گزینه صحیح',
            'is_correct' => 1,
            'quiz_id' => 6,
        ]);

        Answer::create([
            'answer_text' => 'گزینه 3 مربوط به سوال شش',
            'is_correct' => 0,
            'quiz_id' => 6,
        ]);

        Answer::create([
            'answer_text' => 'گزینه 4 مربوط به سوال شش و گزینه صحیح',
            'is_correct' => 1,
            'quiz_id' => 6,
        ]);

        Answer::create([
            'answer_text' => 'گزینه 5 مربوط به سوال شش',
            'is_correct' => 0,
            'quiz_id' => 6,
        ]);
    }
}
