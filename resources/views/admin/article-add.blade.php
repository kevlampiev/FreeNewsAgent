@extends('layouts.adminLayout')

@section('title') @parent Изменение новости @endsection

@section('content')

    <div>

    </div>
    <div class="article-container shadowed-box">
        <form method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">

                <input type="checkbox" id="isprivate" name="is_private"
                       {{((old('is_private')=='1')||($article->is_private==1))?'checked':''}}
                    value="1">

                <label class="form-check-label" for="isprivate">
                    Новость приватная
                </label>
            </div>

            <div class="form-group {{$errors->has('title')?'has-error':''}}">

                <label for="title">Заголовок статьи</label>
                @if ($errors->has('title'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('title') }}
                    </div>
                @endif

                <input class="form-control" id="title" name="title" type="text"
                       value="{{(count($errors)>0)?old('title'):$article->title}}">
            </div>

            <div class="form-group">
                <label for="category">Категория новости</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categoryList as $cat)
                        <option value="{{$cat->id}}" @if ($cat->id==$id) selected @endif>
                            {{$cat->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group {{$errors->has('announcement')?'has-error':''}}">
                <label for="announcement">Аннотация</label>
                @if ($errors->has('announcement'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('announcement') }}
                    </div>
                @endif
                <textarea class="form-control" id="announcement" rows="3" name="announcement">{{(count($errors)>0)?old('announcement'):$article->announcement}}</textarea>
            </div>

            <div class="form-group {{$errors->has('article_body')?'has-error':''}}">
                <label for="description">Текст статьи</label>
                @if ($errors->has('article_body'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('article_body') }}
                    </div>
                @endif
                <textarea class="form-control" id="description" rows="10" name="article_body">{{(count($errors)>0)?old('article_body'):$article->article_body}}</textarea>
            </div>

            <div class="form-group">
                <input type="file" name="img">
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{route('admin.articlesOfCategory',[$slug])}}"
               class="btn btn-secondary ">
                Отмена
            </a>
        </form>
    </div>
@endsection

{{--@section('stylesheets')--}}
{{--    <link rel="stylesheet" href="{{asset('css/article.css')}}">--}}
{{--@endsection--}}
