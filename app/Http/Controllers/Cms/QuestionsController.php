<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class QuestionsController extends Controller
{
    public function index(Test $test)
    {
        $page_title = 'Вопросы';

        $questions = Question::where('test_id', $test->id)->get();

        return view('cms.questions.index', compact('questions', 'page_title', 'test'));
    }

    public function create(Test $test)
    {
        $page_title = 'Создать вопрос';

        return view('cms.questions.form', [
            'test' => $test,
            'question' => null,
            'page_title' => $page_title,
        ]);
    }

    public function store(Test $test, Request $request)
    {
        $input  = $request->all();

        $question = new Question();

        $question->fill($input + ['test_id' => $test->id]);

        $question->save();

        Session::flash('message', 'Вопрос создан');
        Session::flash('alert-class', 'alert-success');

        return redirect('/cms/tests/' . $test->id . '/questions');
    }

    public function edit(Test $test, Question $question)
    {

        $page_title = 'Редактировать вопрос';

        return view('cms.questions.form', [
            'test' => $test,
            'question' => $question,
            'page_title' => $page_title,
        ]);
    }

    public function update(Test $test, Question $question, Request $request)
    {
        $input = $request->all();

        $question->fill($input + ['test_id' => $test->id]);

        $question->update();

        Session::flash('message', 'Вопрос отредактирован');
        Session::flash('alert-class', 'alert-success');

        return redirect('/cms/tests/' . $test->id . '/questions');
    }

    public function destroy(Test $test, Question $question)
    {
        $question->delete();

        Session::flash('message', 'Вопрос удален');
        Session::flash('alert-class', 'alert-danger');

        return redirect('/cms/tests/' . $test->id . '/questions');
    }
}
