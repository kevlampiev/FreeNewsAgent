@extends('layouts.mainlayout')

@section('title') @parent Содержимое новости @show

@section('content')

    <div class="article-container shadowed-box">
        <img src="{{($new->img==null||$new->img=='')?asset('storage/images/articles/no_image.jpg'):$new->img}}"
             alt="Иллюстриция к новости" class="article-img">
        <H3 class="article-header">{{$new->title}}</H3>
        <h5>{{$new->category->name}}</h5>
        <p><i> {{$new->announcement}}</i></p>

        <p> {!! $new->article_body !!}</p>
        <hr>
        <a href="{{route('customer.articlesOfCategory',[$new->category->slug])}}">
            Ко всем новостям категории {{$new->category->name}}
        </a>
    </div>
@endsection

