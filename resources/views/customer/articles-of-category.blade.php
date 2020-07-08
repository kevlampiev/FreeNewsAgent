@extends('layouts.mainlayout')

@section('content')

    <H3>Новости категории {{$category->name}}</H3>
    <div class="news-container">
        <div class="ordering-block">
            <div>
                <a href="{{route('addArticle',[$category->id])}}" class="btn btn-secondary ">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Добавить новость от себя
                </a>
            </div>
        </div>
        @foreach ($news as $new)

            <div class="article-box">
                <div class="article-main-block">
                    <a href="{{route('showArticle',[
                                                $new->category_id,
                                                $new->id
                                                ])}}" class="mega-anchor">
                        <h5>
                            {{$new->title}}
                        </h5>
                    </a>
                    <h6>{{$new->created_at}} - {{$category->name}}</h6>
                    <p>
                        {{$new->announcement}}
                    </p>
                </div>
                <div class="article-control-block">
                    <a href="{{route('editArticle',['category_id'=>$new->category_id,'article'=>$new->id])}}" class="article-control-link">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        Изменить
                    </a>
                    <a href="{{route('deleteArticle',['category_id'=>$new->category_id,'article'=>$new->id])}}" class="article-control-link delete"
                       data-method="POST" data-confirm="Уверены, что хотите удалить эту запись?" data-token="{{ csrf_token() }}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Удалить
                    </a>
                </div>



            </div>

        @endforeach
    </div>
@endsection

{{--<div class="confirmation-window shadowed-box hidden" id="delete-conf-window">--}}
{{--    @csrf--}}
{{--    <form method="POST">--}}
{{--        <p>Вы действительно хотите удалить эту запись?</p>--}}
{{--        <div class="controls">--}}
{{--            <button type="submit" class="btn btn-secondary">Удалить</button>--}}
{{--            <a href="#" class="btn btn-light">--}}
{{--                Отмена--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}


@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/articles-list.css')}}">
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
