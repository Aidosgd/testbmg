@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Лекций</div>
        <div class="panel-body">
            <div><b>Количество правильных</b> : {{ $result->right_answer }}</div>
            <div><b>Количество неправильных</b> : {{ $result->wrong_answer }}</div>
            <div><b>Всего вопросов</b> : {{ $result->questions }}</div>
        </div>
    </div>
@endsection