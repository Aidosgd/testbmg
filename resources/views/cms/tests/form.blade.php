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
                        {!! Form::model($test, ['method' => ($test) ? 'PUT' : 'POST', 'files'=>true, 'route' => ['cms.tests.'.($test?'update':'store'), ($test)?$test->id:'' ]]) !!}
                        <div>
                            <div class="form-group">
                                <label>Название</label>
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                {{ Form::select('lecture_id', $lectures->lists('title', 'id'), $test ? $test->lecture->id : null, ['class' => 'form-control']) }}
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