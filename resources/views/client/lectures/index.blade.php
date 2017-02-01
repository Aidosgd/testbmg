@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Лекций</div>
        <div class="panel-body">
            <div class="row">
                @foreach($lectures as $lecture)
                    <div class="col-md-6">
                        <div class="item-block">
                            <h2>{{ $lecture->title }}</h2>
                            <img src="https://img.youtube.com/vi/{{ $lecture->youtube_link }}/0.jpg" alt="">
                            <p>{!! $lecture->description !!}</p>
                            <a href="/client/lecture/{{ $lecture->id }}/test" class="btn btn-default">
                                Перейти к тесту
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection