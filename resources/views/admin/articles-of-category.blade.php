@extends('layouts.adminLayout')

@section('title') @parent Новости категории @show

@section('content')

    <H3>Новости категории {{$category->name}}</H3>
    <div class="news-container">
        <div class="ordering-block">
            <div>
                <a href="{{route('admin.addArticle',[$category->slug])}}" class="btn btn-secondary ">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Добавить
                </a>
            </div>
        </div>
        @foreach ($news as $new)

{{--            <div>--}}
            <div class="article-box">
                <div class="article-main-block">
{{--                    <a href="{{route('showArticle',[--}}
{{--                                                $category->slug,--}}
{{--                                                $new->id--}}
{{--                                                ])}}" class="mega-anchor">--}}
                        <h5 class="article-header">
                            {{$new->title}}
                        </h5>
{{--                    </a>--}}
                    <h6>{{$new->created_at}} - {{$category->name}}</h6>
                    <p>
                        {{$new->announcement}}
                    </p>
                </div>
                <div class="article-control-block">
                    <a href="{{route('admin.editArticle',['slug'=>$category->slug,'article'=>$new->id])}}" class="article-control-link">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        Изменить
                    </a>
                    <a href="{{route('admin.deleteArticle',['slug'=>$category->slug,'article'=>$new->id])}}" class="article-control-link delete"
                       data-method="POST" data-confirm="Уверены, что хотите удалить эту запись?" data-token="{{ csrf_token() }}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Удалить
                    </a>
                </div>
            </div>

        @endforeach
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/laravel-post-button.js')}}"  defer>  </script>
@endsection
