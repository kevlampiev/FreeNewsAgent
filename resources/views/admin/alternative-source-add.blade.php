@extends('layouts.adminLayout')

@section('title') @parent Изменение альтернативного источника @endsection

@section('content')

    <div class="article-container shadowed-box">
        <form method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Название источника</label>
                <input class="form-control" id="name" name="name" type="text"
                       value="{{(count($errors)>0)?old('name'):$source->name}}">
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <input class="form-control" id="url" name="url" type="text"
                       value="{{(count($errors)>0)?old('url'):$source->url}}">
            </div>

            <div class="form-group">
                <label for="description">Аннотация</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{(count($errors)>0)?old('description'):$source->description}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{route('admin.alternativeSourcesList')}}"
               class="btn btn-secondary ">
                Отмена
            </a>

        </form>
    </div>
@endsection
