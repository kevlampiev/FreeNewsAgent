@extends('layouts.adminLayout')

@section('title') @parent Изменение категории @endsection

@section('content')

    <div class="article-container shadowed-box">
        <form method="POST">
            @csrf

            <div class="form-group {{$errors->has('name')?'has-error':''}}">

                <label for="name">Название категории</label>
                @if ($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <input class="form-control" id="name" name="name" type="text"
                       value="{{(count($errors)>0)?old('name'):$category->name}}">
            </div>

            <div class="form-group {{$errors->has('slug')?'has-error':''}}">

                <label for="slug">Slug</label>
                @if ($errors->has('slug'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('slug') }}
                    </div>
                @endif
                <input class="form-control" id="slug" name="slug" type="text"
                       value="{{(count($errors)>0)?old('slug'):$category->slug}}">
            </div>

            <div class="form-group {{$errors->has('description')?'has-error':''}}">
                <label for="description">Аннотация</label>
                @if ($errors->has('description'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <textarea class="form-control" id="description" rows="3"
                          name="description">{{(count($errors)>0)?old('description'):$category->description}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{route('admin.categoriesList')}}"
               class="btn btn-secondary ">
                Отмена
            </a>

        </form>
    </div>
@endsection
