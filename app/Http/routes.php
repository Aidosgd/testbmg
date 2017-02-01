<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'cms'], function () {

    $menus = [
        "lectures" => "Лекций",
        "tests" => "Тесты",
        "results" => "Результаты",
    ];
    \Illuminate\Support\Facades\View::share(compact('menus'), 'layouts/app');

    Route::model('lectures', 'App\Models\Lecture');
    Route::resource('lectures', 'Cms\LecturesController');

    Route::model('tests', 'App\Models\Test');
    Route::resource('tests', 'Cms\TestsController');

    Route::model('questions', 'App\Models\Question');
    Route::resource('tests.questions', 'Cms\QuestionsController');

    Route::model('answers', 'App\Models\Answer');
    Route::resource('questions.answers', 'Cms\AnswersController');

    Route::get('results', function (){
        $results = \App\Models\Result::all();
       return view('cms.results', compact('results'));
    });
});

Route::group(['prefix' => 'client'], function () {
    Route::get('/', 'ClientController@index');

    Route::get('/lecture/{id}/test', 'ClientController@test')->middleware('auth');;
    Route::post('/lecture/{id}/result', 'ClientController@result');
});
Route::auth();

Route::get('/home', 'HomeController@index');
