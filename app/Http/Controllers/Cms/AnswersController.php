<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Lecture;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AnswersController extends Controller
{
    public function index(Question $question)
    {
        $page_title = 'Ответы';

        $answers = Answer::where('question_id', $question->id)->get();

        return view('cms.answers.index', compact('answers', 'page_title', 'question'));
    }

    public function create(Question $question)
    {
        $page_title = 'Создать ответ';

        return view('cms.answers.form', [
            'question' => $question,
            'answer' => null,
            'page_title' => $page_title,
        ]);
    }

    public function store(Question $question, Request $request)
    {
        $input  = $request->all();

        $answer = new Answer();

        $answer->fill($input + ['question_id' => $question->id]);

        $answer->save();

        Session::flash('message', 'Ответ создан');
        Session::flash('alert-class', 'alert-success');

        return redirect('/cms/questions/' . $question->id . '/answers');
    }

    public function edit(Question $question, Answer $answer)
    {

        $page_title = 'Редактировать ответ';

        return view('cms.answers.form', [
            'question' => $question,
            'answer' => $answer,
            'page_title' => $page_title,
        ]);
    }

    public function update(Question $question, Answer $answer, Request $request)
    {
        $input = $request->all();

        $answer->fill($input + ['question_id' => $question->id]);

        $answer->update();

        Session::flash('message', 'Ответ отредактирован');
        Session::flash('alert-class', 'alert-success');

        return redirect('/cms/questions/' . $question->id . '/answers');
    }

    public function destroy(Question $question, Answer $answer)
    {
        $answer->delete();

        Session::flash('message', 'Ответ удален');
        Session::flash('alert-class', 'alert-danger');

        return redirect('/cms/questions/' . $question->id . '/answers');
    }
}
