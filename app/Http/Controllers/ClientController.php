<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $menus = [];

        $lectures = Lecture::all();

        return view('client.lectures.index', compact('menus', 'lectures'));
    }

    public function test($id)
    {
        $test = Test::with('questions.answers')->where('lecture_id', $id)->first();

        return view('client.lectures.test', compact('id', 'test'));
    }

    public function result(Request $request)
    {
        $questions = $request->input('questions');

        $right_answer = 0;

        foreach ($questions as $question => $answer) {

            $right_answer += Answer::where('id', $answer)->first()->status;

        }

        $wrong_answer = count($questions) - $right_answer;

        $user = Auth::user();

        $result = new Result();

        $result->fill([
            'user_id' => $user->id,
            'questions' => count($questions),
            'right_answer' => $right_answer,
            'wrong_answer' => $wrong_answer,
        ])->save();

        return view('client.lectures.result', compact('result'));
    }
}
