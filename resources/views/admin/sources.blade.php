@extends('layouts.adminLayout')

@section('title') @parent Источники информации @show

@section('content')

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
                    <a href="#" class="article-control-link">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        Изменить
                    </a>
                    <a href="#" class="article-control-link delete"
                        {{--                           data-method="POST" data-confirm="Уверены, что хотите удалить эту запись?" data-token="{{ csrf_token() }}"--}} >
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Удалить
                    </a>
                </div>
            </div>

        @endforeach
    </div>
@endsection

{{--@section('stylesheets')--}}
{{--    <link rel="stylesheet" href="{{asset('css/categories.css')}}">--}}
{{--@endsection--}}
