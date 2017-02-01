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
                        <a href="{{ route('cms.tests.create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i> Создать
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Название лекций</th>
                                <th>Действия</th>
                            </tr>
                            @foreach($tests->sortBy('id') as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->lecture->title }}</td>
                                    <td>
                                        <a href="/cms/tests/{{ $item->id }}/edit" class="btn btn-warning btn-sm">
                                            Редактировать
                                        </a>
                                        <form action="{{ route('cms.tests.destroy', $item->id) }}" method="POST" style="display: inline-block">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-danger btn-sm">Удалить</button>
                                        </form>
                                        <a href="/cms/tests/{{ $item->id }}/questions" class="btn btn-default btn-sm">
                                            Вопросы
                                        </a>
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