@extends('layouts.mainlayout')

@section('title') @parent Новости категории @show

@section('content')

    <H3>Новости категории {{$category->name}}</H3>
    <div class="news-container">
        @foreach ($news as $new)

            <div class="article-box">
                <a href="{{route('customer.showArticle',[
                                                $category->slug,
                                                $new->id
                                                ])}}" class="mega-anchor">
                    <div class="article-main-block">

                            <img src="{{asset('storage/images/articles/'.(basename($new->img)?basename($new->img):'no_image.jpg'))}}" alt="Иллюстриция к новости" class="article-img">
                            <h5 class="article-header">
                                {{$new->title}}
                            </h5>

                        <h6>{{$new->created_at}} - {{$category->name}}</h6>
                        <p>
                            {{$new->announcement}}
                        </p>
                    </div>
                </a>

            </div>

        @endforeach
        <div class="pages-nav-block">
            {{$news->links()}}
        </div>
    </div>
@endsection

@section('stylesheets')
{{--    <link rel="stylesheet" href="{{asset('css/articles-list.css')}}">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection

@section('scripts')
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="{{asset('js/laravel-post-button.js')}}">

    </script>
@endsection
