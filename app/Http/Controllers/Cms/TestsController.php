<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\Test;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class TestsController extends Controller
{
    public function index()
    {

        $page_title = 'Все тесты';

        $tests = Test::get();

        return view('cms.tests.index', compact('tests', 'page_title'));
    }

    public function create()
    {
        $page_title = 'Создать тест';

        $lectures = Lecture::all();

        return view('cms.tests.form', [
            'test' => null,
            'page_title' => $page_title,
            'lectures' => $lectures,
        ]);
    }

    public function store(Request $request)
    {
        $input  = $request->all();

        $test = new Test();

        $test->fill($input);

        $test->save();

        Session::flash('message', 'Леция создана');
        Session::flash('alert-class', 'alert-success');

        return redirect('/cms/tests');
    }

    public function edit($test)
    {

        $page_title = 'Редактировать тест';

        $lectures = Lecture::all();

        return view('cms.tests.form', [
            'test' => $test,
            'page_title' => $page_title,
            'lectures' => $lectures
        ]);
    }

    public function update($test, Request $request)
    {
        $input = $request->all();

        $test->fill($input);

        $test->update();

        Session::flash('message', 'Тест отредактирован');
        Session::flash('alert-class', 'alert-success');

        return redirect('/cms/tests');
    }

    public function destroy($test)
    {

        $test->delete();

        Session::flash('message', 'Тест удален');
        Session::flash('alert-class', 'alert-danger');

        return redirect('/cms/tests');
    }
}
