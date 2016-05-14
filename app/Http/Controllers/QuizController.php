<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuizController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only' => ['index']]);
        $this->middleware('isAdmin', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizz = Quiz::all();
        return view('quiz.index')->with(compact('quizz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quiz = Quiz::create([
            'title' => $request->title,
        ]);
        return redirect()->route('quiz.show', $quiz->id);
    }

    /*
     * Store a newly created question.
     */
    public function storeQuestion($id, Requests\QuestionRequest $request)
    {
        $question = Question::create([
            'title' => $request->title,
            'quiz_id' => $request->id,
            'answer_1' => $request->answer_1,
            'answer_2' => $request->answer_2,
            'answer_3' => $request->answer_3,
            'answer_4' => $request->answer_4,
            'right_answer' => $request->right_answer,
        ]);
        return redirect()->route('quiz.show', $id);
    }

    public function editQuestion($id)
    {
        $question = Question::find($id);
        if($question){
            return view('quiz.question.edit')->with(compact('question'));
        }
        else{
            return view('quiz.index');
        }
    }

    public function updateQuestion($id, Requests\QuestionRequest $request)
    {
        $question = Question::find($id);
        if($question){
            $question->title = $request->title;
            $question->answer_1 = $request->answer_1;
            $question->answer_2 = $request->answer_2;
            $question->answer_3 = $request->answer_3;
            $question->answer_4 = $request->answer_4;
            $question->right_answer = $request->right_answer;
            $question->save();
            return redirect()->route('quiz.show', $question->quiz_id);
        }
        else{
            return redirect()->route('quiz.index');
        }
    }

    public function destroyQuestion($id)
    {
        $question = Question::find($id);
        $url = $question->quiz_id;
        if($question){
            $question->delete();
            return redirect()->route('quiz.show', $url);
        }
        else
            return redirect()->route('quiz.show', $url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);
        $questions = Question::where('quiz_id', $id)->orderBy('id', 'asc')->get();
        if($quiz){
            return view('quiz.show')->with(compact('quiz', 'questions'));
        }
        else{
            return view('quiz.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        return view('quiz.edit')->with(compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quiz = Quiz::find($id);
        if($quiz){
            $quiz->title = $request->title;
            $quiz->save();
            return redirect()->route('quiz.show', $id);
        }
        else{
            return redirect()->route('quiz.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id);
        if($quiz){
            $quiz->delete();
            return redirect()->route('quiz.index');
        }
        else
            return redirect()->route('quiz.index');
    }
}
