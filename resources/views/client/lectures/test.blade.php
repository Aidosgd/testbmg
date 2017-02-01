@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Лекций</div>
        <div class="panel-body">
            <div class="row">
                <form action="/client/lecture/{{ $id }}/result" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @foreach($test->questions as $question)
                        <h3>{{ $question->title }}</h3>
                        @foreach($question->answers as $answer)
                            <label>{{ $answer->title }}</label>
                            <input name="questions[{{ $question->id }}]" type="radio" value="{{ $answer->id }}">
                        @endforeach
                    @endforeach
                    <div>
                        <button>Узнать результат</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection