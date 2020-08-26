@extends('layouts.adminLayout')

@section('title') @parent Запрос информации @show

@section('content')

    <div class="article-container shadowed-box">
        <form method="POST" action="{{route('infoRequest.update',[$id])}}">
            @csrf

            {{ method_field('PATCH') }}

            @if(count($errors->all())>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}} <br>
                    @endforeach
                </div>
            @endif

            <div class="form-group">
                <label for="user_name">Ваше имя:</label>
                <input type="text" class="form-control" id="user_name" name="user_name"
                       value="{{$ireq->user_name ?? old('user_name')}}">
            </div>

            <div class="form-group">
                <label for="phone">Телефон для связи:</label>
                <input type="tel" name="phone" id="phone" class="form-control bfh-phone" data-format="+7dddddddddd"
                       value="{{$ireq->phone ?? old('phone')}}" pattern="(\+[\d\ \(\)\-]{16})"/>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$ireq->email??old('email')}}">
            </div>


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

