@extends('layouts.app')

@section('content')
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>{{ $page_title }}</h3>
                        <a href="{{ route('cms.questions.answers.create', [$question->id]) }}" class="btn btn-success">
                            <i class="fa fa-plus"></i> Создать
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Название ответа</th>
                                <th>Статус ответа</th>
                                <th>Название вопроса</th>
                                <th>Действия</th>
                            </tr>
                            @foreach($answers->sortBy('id') as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->status ? 'да' : 'нет' }}</td>
                                    <td>{{ $item->question->title }}</td>
                                    <td>
                                        <a href="{{ route('cms.questions.answers.edit', [$question->id, $item->id]) }}" class="btn btn-warning btn-sm">
                                            Редактировать
                                        </a>
                                        <form action="{{ route('cms.questions.answers.destroy', [$question->id, $item->id]) }}" method="POST" style="display: inline-block">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-danger btn-sm">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection