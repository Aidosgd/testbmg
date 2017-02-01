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
                        <a href="{{ url('/cms/lectures/create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i> Создать
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Видео</th>
                                <th>Действия</th>
                            </tr>
                            @foreach($lectures->sortBy('id') as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{!! $item->description  !!}</td>
                                    <td>{{ $item->youtube_link }}</td>
                                    <td>
                                        <a href="/cms/lectures/{{ $item->id }}/edit" class="btn btn-warning btn-sm">
                                            <i class="fa fa-pencil"></i>
                                            Редактировать
                                        </a>
                                        <form action="{{ URL::route('cms.lectures.destroy', $item->id) }}" method="POST" style="display: inline-block">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Удалить</button>
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