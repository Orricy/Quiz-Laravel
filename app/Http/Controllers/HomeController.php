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
        return view('home')->with(compact('quiz'));
    }

    public function game($id)
    {
        $quiz = Quiz::find($id);
        $questions = Question::where('quiz_id', $id)->orderBy('id', 'asc')->get();
        return view('game.show')->with(compact('quiz', 'questions'));
    }
}
