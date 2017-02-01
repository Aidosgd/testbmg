@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Результаты</div>
        <div class="panel-body">
            @foreach($results as $result)
                <div>{{ $result->user->name }}</div>
                <div><b>Количество правильных</b> : {{ $result->right_answer }}</div>
                <div><b>Количество неправильных</b> : {{ $result->wrong_answer }}</div>
                <div><b>Всего вопросов</b> : {{ $result->questions }}</div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection