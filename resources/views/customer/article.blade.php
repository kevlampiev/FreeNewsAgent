@extends('layouts.mainlayout')

@section('title') @parent Содержимое новости @show

@section('content')

    <div class="article-container shadowed-box">
        <img src="{{asset('storage/images/articles/'.(basename($new->img)?basename($new->img):'no_image.jpg'))}}" alt="Иллюстриция к новости" class="article-img">
        <H3 class="article-header">{{$new->title}}</H3>
        <h5>{{$new->category->name}}</h5>
        <p> <i> {{$new->announcement}}</i></p>

        <p> {{$new->article_body}}</p>
        <hr>
        <a href="{{route('customer.articlesOfCategory',[$new->category->slug])}}">
            Ко всем новостям категории {{$new->category->name}}
        </a>
    </div>
@endsection

{{--@section('stylesheets')--}}
{{--    <link rel="stylesheet" href="{{asset('css/article.css')}}">--}}
{{--@endsection--}}
