<?php

namespace App\Http\Controllers;

use App\Quiz;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Request;
use App\QuizOption;
use App\QuizAnswer;

class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function auth() {
        return Uuid::generate()->string;
    }

    public function vote(Quiz $quiz, QuizOption $quizOption){
        if(QuizAnswer::where('quiz_id', $quiz)->where('user_id', Request::get('user_id'))->count()){
            return response()->json(['error' => 'Quiz already answered'], 401);
        }
        $quizAnswer = QuizAnswer::create([
            'quiz_option_id' => $quizOption->id,
            'quiz_id' => $quiz->id,
            'user_id' => Request::post('user_id')
        ]);
        $quiz = Quiz::with('quiz_options')->find($quiz->id); //Regenerate
        $quiz->answered = true;
        return $quiz;
    }

    public function question() {
        $quiz = Quiz::with('quiz_options')->latest('id')->first();

        if(QuizAnswer::where('quiz_id', $quiz->id)->where('user_id', Request::get('user_id'))->count()){
            $quiz->answered = true;
            return $quiz;
        }

        $quiz->answered = false;
        return $quiz;
    }

    public function results() {
        $quiz = Quiz::with('quiz_options')->latest('id')->first();
        return $quiz;
    }
}
