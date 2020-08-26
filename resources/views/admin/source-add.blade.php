@extends('layouts.adminLayout')

@section('title') @parent Изменение истоника @endsection

@section('content')

    <div class="article-container shadowed-box">
        <form method="POST">
            @csrf
            {{--            @dd($source)--}}
            <div class="form-group {{$errors->has('name')?'has-error':''}}">

                <label for="name">Название источника новостей</label>
                @if ($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <input class="form-control" id="name" name="name" type="text"
                       value="{{(count($errors)>0)?old('name'):$source->name}}">
            </div>

            <div class="form-group {{$errors->has('http_adress')?'has-error':''}}">

                <label for="http_address">URL</label>
                @if ($errors->has('http_address'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('http_address') }}
                    </div>
                @endif
                <input class="form-control" id="http_address" name="http_address" type="text"
                       value="{{(count($errors)>0)?old('http_address'):$source->http_address}}">
            </div>

            <div class="form-group {{$errors->has('description')?'has-error':''}}">
                <label for="description">Краткое описание</label>
                @if ($errors->has('description'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <textarea class="form-control" id="description" rows="3"
                          name="description">{{(count($errors)>0)?old('description'):$source->description}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{route('admin.infoSourcesList')}}"
               class="btn btn-secondary ">
                Отмена
            </a>

        </form>
    </div>
@endsection
