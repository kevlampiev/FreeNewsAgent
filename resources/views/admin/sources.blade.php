@extends('layouts.adminLayout')

@section('title') @parent Источники информации @show

@section('content')
    <div class="ordering-block">
        <div>
            <a href="{{route('admin.addInfoSource')}}" class="btn btn-secondary ">
                <i class="fa fa-plus-square" aria-hidden="true"></i> Добавить
            </a>
        </div>
    </div>

    <div class="source-container">

        @foreach ($sources as $source)

            <div class="source-card shadowed-box">
                {{--                <a href="{{route('articlesOfCategory',[$category->id])}}" class="mega-anchor">--}}
                <h5>
                    {{$source->name}}
                </h5>
                <p>
                    {{$source->http_address}}
                </p>
                <p>
                    {{$source->description}}
                </p>
                {{--                </a>--}}
                <div class="category-control-block">

                    <a href="{{route('admin.editInfoSource',[$source])}}" class="article-control-link">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        Изменить
                    </a>
                    <a
                        @if($source->articles_count==0)
                        href="{{route('admin.deleteInfoSource',[$source])}}"
                        class="article-control-link delete"
                        data-method="POST" data-confirm="Уверены, что хотите удалить эту запись?"
                        data-token="{{ csrf_token() }}"
                        @else
                        href="#"
                        class="article-control-link disabled-btn"
                        onclick="alert('Нельзя удалить источник: есть статьи, полученные из этого источника')"
                        @endif
                    >

                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Удалить
                    </a>

                    <a href="{{route('admin.parseInfoSource',[$source])}}" class="article-control-link"
                       data-method="POST" data-token="{{ csrf_token() }}">
                        <i class="fa fa-external-link" aria-hidden="true"></i>
                        Загрузить статьи
                    </a>

                </div>
            </div>

        @endforeach
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/laravel-post-button.js')}}" defer></script>
@endsection
