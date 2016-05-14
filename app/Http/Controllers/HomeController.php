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

    public function noMoreQuestion($quiz_id, $question_id, $score)
    {
        $quiz = Quiz::find($quiz_id);
        $questionNb = intval($question_id);
        $score = $score + 10;
        $questionTotal = Question::where('quiz_id', $quiz_id)->get();
        $total = count($questionTotal);
        if($questionNb == $total){
            return view('game.end')->with(compact('quiz', 'score'));
        }
        else{
            return $questionNb;
        }
    }

    public function game($quiz_id, $question_id, $score = 0)
    {
        $quiz = Quiz::find($quiz_id);
        $next = $this->noMoreQuestion($quiz_id, $question_id, $score);
        if(!is_int($next))
            return $next;
        $question = Question::where('quiz_id', $quiz_id)->get()[$next];
        if($question){
            return view('game.show')->with(compact('quiz', 'question', 'next', 'score'));
        }
        else
            return view('home')->with(compact('quiz', 'question'));
    }

    public function validation(Request $request, $quiz_id, $question_id)
    {
        $score = intval($request->score);
        $next = $this->noMoreQuestion($quiz_id, $question_id, $score);
        if(!is_int($next))
            return $next;
        $question = Question::where('quiz_id', $quiz_id)->get()[$next-1];
        $answer = intval($request->answer);

        
        //var_dump([$score]);
        if($question->right_answer === $answer)
            $display = $this->game($quiz_id, $next, $score + 10);
        else
            $display = $this->game($quiz_id, $next);
        return $display;
    }
}
