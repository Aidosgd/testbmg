@extends('layouts.app')

@section('content')
    @if($errors)
        <div>
            <ul>
                @foreach($errors->all('<li>:message</li>') as $error)
                    {!! $error !!}
                @endforeach
            </ul>
        </div>
    @endif
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $page_title }}</div>
                    <div class="panel-body">
                        {!! Form::model($lecture, ['method' => ($lecture) ? 'PUT' : 'POST', 'files'=>true, 'route' => ['cms.lectures.'.($lecture?'update':'store'), ($lecture)?$lecture->id:'' ]]) !!}
                        <div>
                            <div class="form-group">
                                <label>Название</label>
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label>Ссылка на видео(youtube)</label>
                                {!! Form::text('youtube_link', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
@endsection