

@extends('layouts.mainlayout')

@section('title') @parent Запрос информации @show

@section('content')

    <div class="article-container shadowed-box">
        <form method="POST">
            @csrf

            @if(count($errors->all())>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}} <br>
                    @endforeach
                </div>
            @endif

            <div class="form-group">
                <label for="username">Ваше имя:</label>
                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}">
            </div>

            <div class="form-group">
                <label for="phone">Телефон для связи:</label>
                <input type="tel" name="phone" id="phone" class="form-control bfh-phone" data-format="+7dddddddddd" value="{{old('phone')}}" pattern="(\+[\d\ \(\)\-]{16})" />
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
            </div>


            <div class="form-group">
                <label for="description">Описание требуемой информации:</label>
                <textarea class="form-control" id="description" rows="7" name="description">{{old('description')}}</textarea>
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

{{--@section('scripts')--}}
{{--    <script src="{{asset('js/bootstrap-formhelpers-phone.js')}}"></script>--}}
{{--@endsection--}}
