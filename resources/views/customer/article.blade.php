@extends('layouts.mainlayout')

@section('content')

    <div class="article-container shadowed-box">
        <H3>{{$new->title}}</H3>
        <h5>{{$new->category->name}}</h5>
        <p> {{$new->description}}</p>
        <hr>
        <a href="{{route('articlesOfCategory',[$new->category_id])}}">
            Ко всем новостям категории {{$new->category->name}}
        </a>
    </div>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/article.css')}}">
@endsection
