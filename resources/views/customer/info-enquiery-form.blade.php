@extends('layouts.mainlayout')

@section('title') @parent Запрос информации @show

@section('content')

    <div class="article-container shadowed-box">
        <div class="card-header">Запрос данных</div>
        <form method="POST">
            @csrf

            @if(count($errors->all())>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}} <br>
                    @endforeach
                </div>
            @endif

            <input type="hidden" name="user_id" value="{{$ireq->user_id ?? old('user_id')}}">

            <div class="form-group">
                <label for="request_body">Описание требуемой информации:</label>
                <textarea class="form-control" id="request_body" rows="7"
                          name="request_body">{{$ireq->request_body ?? old('request_body')}}</textarea>
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

