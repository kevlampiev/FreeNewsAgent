@extends('mainlayout')

@section('content')

    <div class="article-container shadowed-box">
        <H3>{{$new['title']}}</H3>
        <h5>{{$new['created_at']}}</h5>
        <h6>{{$new['category']}}</h6>
        <p> {{$new['description']}}</p>
        <hr>
        <a href="{{route('articlesOfCategory',[$new['category_id']])}}">
            Ко всем новостям категории {{$new['category']}}
        </a>
    </div>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/article.css')}}">
@endsection
