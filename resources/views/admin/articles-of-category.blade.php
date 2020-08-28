@extends('layouts.adminLayout')

@section('title') @parent Новости категории @show

@section('content')

    {{--    @dd($news)--}}
    <H3>Новости категории {{$category->name}}</H3>
    <div class="news-container">
        <div class="ordering-block">
            <div>
                <a href="{{route('admin.addArticle',[$category->slug])}}" class="btn btn-secondary ">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Добавить
                </a>
            </div>
        </div>
        @include('admin.articles-template')
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/laravel-post-button.js')}}" defer></script>

@endsection
