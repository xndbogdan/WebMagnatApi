<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Quiz;
use App\QuizAnswer;
use Webpatser\Uuid\Uuid;

class QuizTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quiz = Quiz::create([
            'title' => 'How do you find our service?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $quiz->quiz_options()->create([
            'text' => 'Good'
        ]);

        $quiz->quiz_options()->create([
            'text' => 'Fair'
        ]);

        $quiz->quiz_options()->create([
            'text' => 'Neutral'
        ]);

        $quiz->quiz_options()->create([
            'text' => 'Bad'
        ]);

        for($i=0; $i<rand(80,90); $i++){
            $quizAnswer = QuizAnswer::create([
                'quiz_option_id' => rand(1,4),
                'quiz_id' => $quiz->id,
                'user_id' => Uuid::generate()->string
            ]);
        }

    }
}
