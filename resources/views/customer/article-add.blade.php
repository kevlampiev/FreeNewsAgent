@extends('layouts.mainlayout')

@section('content')

    <div class="article-container shadowed-box">
        <form method="POST">
            @csrf


{{--            @if (count($errors) > 0)--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}

            <div class="form-group">

                <input type="checkbox" class="form-check-input" id="isprivate" name="is_private"
                       @if (old('is_private')=="1")
                           checked
                        @endif
                    value="1"
                >
                <label class="form-check-label" for="isprivate">Новость приватная</label>

            </div>

            <div
                 @if ($errors->has('title'))
                    class="form-group has-error"
                 @else
                 class="form-group"
                 @endif
            >

                <label for="title">Заголовок статьи</label>
                @if ($errors->has('title'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('title') }}
                    </div>
                @endif

                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="category">Категория новости</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categoryList as $cat)
                        <option value="{{$cat->id}}"
                                @if ($cat->id==$id)
                                selected
                            @endif
                        >{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="announcement">Аннотация</label>
                @if ($errors->has('announcement'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('announcement') }}
                    </div>
                @endif
                <textarea class="form-control" id="announcement" rows="3" name="announcement">{{old('announcement')}}</textarea>
            </div>

            <div class="form-group"
{{--                @if ($errors->has('article_body'))--}}
{{--                    has-error--}}
{{--                @endif--}}
            >
                <label for="description">Текст статьи</label>
                @if ($errors->has('article_body'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('article_body') }}
                    </div>
                @endif
                <textarea class="form-control" id="description" rows="10" name="article_body">{{old('article_body')}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{route('articlesOfCategory',[$id])}}"
               class="btn btn-secondary ">
                Отмена
            </a>
        </form>
    </div>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/article.css')}}">
@endsection
