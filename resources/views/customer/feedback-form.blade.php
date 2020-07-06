

@extends('layouts.mainlayout')

@section('content')

    <div class="article-container shadowed-box">
        <form method="POST">
            @csrf

            @if(count($errors->all())>0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $err)
                        <li>{{$err}} </li>
                    @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="username">Ваше имя:</label>
                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}">
            </div>


            <div class="form-group">
                <label for="feedback">Отзыв о работе ресурса:</label>
                <textarea class="form-control" id="feedback" rows="7" name="feedback">{{old('feedback')}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
            <a href="{{url()->previous()}}"
               class="btn btn-secondary ">
                Отмена
            </a>
        </form>
    </div>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/article.css')}}">
@endsection
