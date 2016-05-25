<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Score;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'score', 'week']]);
    }

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

    public function score()
    {
        $users = User::select('id', 'name', 'experience')->orderBy('experience', 'desc')->get();
        if(isset(Auth::user()->id)){
            $myUser = User::find(Auth::user()->id);
            $usersNb = count($users);
            $pos = $usersNb;
            for($i = 0; $i < $usersNb; $i++){
                if($myUser->id == $users[$i]->id){
                    $pos = $i + 1;
                }
            }
            return view('game.score')->with(compact('myUser', 'pos', 'users'));
        }
        else{
            return view('game.score')->with(compact('users'));
        }
    }

    public function week()
    {
        $scores = Score::where('created_at', '>=', Carbon::now()->startOfWeek())->orderBy('value', 'desc')->get();
        return view('game.week')->with(compact('scores'));
    }

    public function noMoreQuestion($quiz_id, $question_id, $score)
    {
        $quiz = Quiz::find($quiz_id);
        $questionNb = intval($question_id);
        $questionTotal = Question::where('quiz_id', $quiz_id)->get();
        $total = count($questionTotal);
        if($questionNb == $total){
            $user = User::find(Auth::user()->id);
            if($user){
                $user->experience = $user->experience + $score + 200;
                $user->save();
                $levelRequirement = [0, 250, 450, 700, 1000, 1350, 1750, 2200, 2700];
                for($i = 0; $i < count($levelRequirement); $i++){
                    if($user->experience >= $levelRequirement[$i] && $user->experience < $levelRequirement[$i+1]){
                        $exp = ($user->experience / $levelRequirement[$i+1] * 100);
                        $level = [
                            'lvl' => $i+1,
                            'exp' => $exp
                        ];
                    }
                }
                $result = Score::create([
                    'user_id' => $user->id,
                    'value' => $score,
                ]);
            }
            return view('game.end')->with(compact('quiz', 'score', 'total', 'user', 'level'));
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
        $questionTotal = Question::where('quiz_id', $quiz_id)->get();
        $total = count($questionTotal);
        if($question){
            return view('game.show')->with(compact('quiz', 'question', 'next', 'score', 'total'));
        }
        else
            return view('home')->with(compact('quiz', 'question'));
    }

    public function validation(Request $request, $quiz_id, $question_id)
    {
        $this->validate($request,
            [
                'score' => 'required|integer',
                'answer' => 'digits:1|integer'
            ],
            [
                'score.integer' => 'Merci de ne pas modifier votre score',
                'score.required' => 'Votre score n\'est pas définie',
                'answer.digits' => 'Votre réponse est incompatible',
                'answer.integer' => 'Votre réponse est incompatible',
            ]);
        $question = Question::where('quiz_id', $quiz_id)->get()[$question_id-1];
        $answer = intval($request->answer);

        if($question->right_answer === $answer)
            $display = $this->game($quiz_id, $question_id, $request->score + 10);
        else
            $display = $this->game($quiz_id, $question_id, $request->score);
        return $display;
    }
}
