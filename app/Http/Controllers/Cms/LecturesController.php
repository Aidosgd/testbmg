<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class LecturesController extends Controller
{
    public function index()
    {

        $page_title = 'Все лекций';

        $lectures = Lecture::get();

        return view('cms.lectures.index', compact('lectures', 'page_title'));
    }

    public function create()
    {
        $page_title = 'Создать лекцию';

        return view('cms.lectures.form', [
            'lecture' => null,
            'page_title' => $page_title
        ]);
    }

    public function store(Request $request)
    {
        $input  = $request->all();

        $lecture = new Lecture();

        $lecture->fill($input);

        $lecture->save();

        Session::flash('message', 'Леция создана');
        Session::flash('alert-class', 'alert-success');

        return redirect('/cms/lectures');
    }

    public function edit($lecture)
    {

        $page_title = 'Редактировать лекцию';

        return view('cms.lectures.form', [
            'lecture' => $lecture,
            'page_title' => $page_title
        ]);
    }

    public function update($lecture, Request $request)
    {
        $input = $request->all();

        $lecture->fill($input);

        $lecture->update();

        Session::flash('message', 'Лекция отредактирована');
        Session::flash('alert-class', 'alert-success');

        return redirect('/cms/lectures');
    }

    public function destroy($lecture)
    {
        $lecture->delete();

        Session::flash('message', 'Лекция удалена');
        Session::flash('alert-class', 'alert-danger');

        return redirect('/cms/lectures');
    }
}
