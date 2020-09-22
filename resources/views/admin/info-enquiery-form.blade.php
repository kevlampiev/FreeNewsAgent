@extends('layouts.adminLayout')

@section('title') @parent Запрос информации @show

@section('content')

    <div class="article-container shadowed-box">
        <div class="card-header">Информационный запрос</div>
        {{--        <form method="POST" action="{{route('infoRequest.update',[$id])}}">--}}

        <form method="POST"
              @if (isset($ireq->id))
              action="{{route('infoEnquiries.update',[$ireq])}}">
            {{ method_field('PATCH') }}
            @else
                action="{{route('infoEnquiries.store')}}">
            @endif

            @csrf

            @if(count($errors->all())>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}} <br>
                    @endforeach
                </div>
            @endif

            <div class="form-group">
                <label for="user_id">Пользователь</label>

                <select class="form-control" id="user_id" name="user_id">
                    @foreach($users as $user)
                        <option
                            value="{{$user->id}}"
                            @if ($user->id==(old('user_id')??$ireq->user_id)) selected @endif>
                            {{$user->name}}
                        </option>
                    @endforeach
                </select>
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

