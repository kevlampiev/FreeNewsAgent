@extends('mainlayout')

@section('content')
    <div class="blocker">

    </div>
    <div class="user_login shadowed-box">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email адрес</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="ivanov@mail.ru">
                <small id="emailHelp" class="form-text text-muted">Мы не предоставляем ваши данные другим лицам.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
            </div>
            <div class="controls">
                <button type="submit" class="btn btn-secondary">Войти</button>
                <a href="/" class="btn btn-light">
                    Отмена
                </a>
            </div>
        </form>
    </div>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
