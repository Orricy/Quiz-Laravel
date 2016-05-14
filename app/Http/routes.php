<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/quiz', 'QuizController');

Route::group(['prefix' => 'quiz'], function(){
    Route::post('/{id}', [
        'as' => 'quiz.storeQuestion',
        'uses' => 'QuizController@storeQuestion'
    ]);
    Route::get('question/{id}', [
        'as' => 'quiz.editQuestion',
        'uses' => 'QuizController@editQuestion'
    ]);
    Route::put('question/{id}', [
        'as' => 'quiz.updateQuestion',
        'uses' => 'QuizController@updateQuestion'
    ]);
    Route::delete('question/{id}', [
        'as' => 'quiz.destroyQuestion',
        'uses' => 'QuizController@destroyQuestion'
    ]);
    /*Route::delete('/{id}', [
        'as' => 'articles.destroyComment',
        'uses' => 'PostController@deleteComment'
    ]);*/
});

Route::group(['prefix' => 'game'], function(){
    Route::get('{quiz_id}/question/{question_id}', [
        'as' => 'home.game',
        'uses' => 'HomeController@game'
    ]);
    Route::post('{quiz_id}/question/{question_id}', [
        'as' => 'home.validation',
        'uses' => 'HomeController@validation'
    ]);
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function() {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

