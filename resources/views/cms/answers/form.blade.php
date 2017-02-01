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
                        {!! Form::model($answer, ['method' => ($answer) ? 'PUT' : 'POST', 'files'=>true, 'route' => ['cms.questions.answers.'.($answer?'update':'store'), $question->id, ($answer)?$answer->id:'']]) !!}
                        <div>
                            <div class="form-group">
                                <label>Название</label>
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label>Правильный ответ</label>
                                {!! Form::checkbox('status', 1) !!}
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