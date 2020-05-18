@extends('layouts.mainlayout')

@section('content')
    <H3>Новости категории {{$category['name']}}</H3>
    <div class="news-container">
        <div class="ordering-block">
            <div>
                <a href="{{route('addArticle',[$category['id']])}}" class="btn btn-secondary ">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Добавить новость от себя
                </a>
            </div>
        </div>
        @foreach ($news as $new)

            <div class="new-box">
                <a href="{{route('showArticle',[
                                                $new['category_id'],
                                                $new['id']
                                                ])}}" class="mega-anchor">
                    <h5>
                        {{$new['title']}}
                    </h5>
                </a>
                <h6>{{$new['created_at']}} - {{$new['category']}}</h6>
                <p>
                    {{$new['description']}}
                </p>

            </div>

        @endforeach
    </div>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/news-list.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endsection
