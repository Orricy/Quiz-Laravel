<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = Quiz::orderby('created_at', 'desc')->first();
        $question = Question::where('quiz_id', $quiz->id)->orderBy('id', 'asc')->take(1)->get();
        return view('home')->with(compact('quiz', 'question'));
    }

    public function game($quiz_id, $question_id)
    {
        $quiz = Quiz::find($quiz_id);
        $questionNb = intval($question_id);
        $questionTotal = Question::where('quiz_id', $quiz_id)->get();
        $total = count($questionTotal);
        if($questionNb == $total){
            return view('game.end')->with(compact('quiz'));
        }
        $question = Question::where('quiz_id', $quiz_id)->get()[$questionNb];

        //$questions = Question::where('quiz_id', $quiz_id)->where('id', $question_id)->orderBy('id', 'asc')->take(1)->get();
        if($question){
            return view('game.show')->with(compact('quiz', 'question', 'questionNb'));
        }
        else
            return view('game.end');
    }
}
