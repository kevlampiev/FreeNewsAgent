@extends('layouts.adminLayout')

@section('title') @parent Категории новостей @show

@section('content')
    <div class="categories-container">
        @foreach ($categories as $category)

            <div class="newscategory shadowed-box">
                <a href="{{route('admin.articlesOfCategory',[$category->slug])}}" class="mega-anchor">
                    <h5 class="article-header">
                        {{$category->name}}
                    </h5>
                    <p>
                        {{$category->description}}
                    </p>

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

                </a>
            </div>

        @endforeach
    </div>
@endsection

{{--@section('stylesheets')--}}
{{--    <link rel="stylesheet" href="{{asset('css/categories.css')}}">--}}
{{--@endsection--}}
