@extends('layouts.mainlayout')

@section('content')
    <div class="container">
        <div class="card-header">Личный кабинет</div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal-data">Персональные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#enquieries">Информационные запросы</a>
                    </li>
                </ul>


                <div class="tab-content">
                    <div class="tab-pane fade show active" id="personal-data">
                        <div class="card shadowed-box">

                            <div class="card-body">
                                <form method="POST">
                                    @csrf

                                    @include('auth.user-info-template');

                                    <div class="form-group row">
                                        <label for="password_conf"
                                               class="col-md-4 col-form-label text-md-right">Текущий пароль</label>

                                        <div class="col-md-6">
                                            <input id="password_conf" type="password"
                                                   class="form-control @error('password_conf') is-invalid @enderror"
                                                   name="password_conf"
                                                   required>

                                            @error('password_conf')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="new-password-1"
                                               class="col-md-4 col-form-label text-md-right">Новый пароль (если требуется изменить пароль)</label>

                                        <div class="col-md-6">
                                            <input id="new-password-1" type="password" class="form-control"
                                                   name="newPassword1" autocomplete="new-password"
                                                   value="{{old('newPassword1')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="new-password-1"
                                               class="col-md-4 col-form-label text-md-right">Новый пароль (повторно)</label>

                                        <div class="col-md-6">
                                            <input id="new-password-2" type="password" class="form-control"
                                                   name="newPassword2" autocomplete="new-password"
                                                   value="{{old('newPassword2')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Save') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="enquieries">
                        <div class="card shadowed-box">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Дата поступления</th>
                                    <th scope="col">Содержание</th>
                                    <th scope="col">Состояние</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($user->enquieries as $req)
                                    <tr>
                                        <th scope="row">{{$req->id}}</th>
                                        <td>{{$req->created_at}}</td>
                                        <td>{{substr($req->request_body,0,min(30, strlen($req->request_body)))."..."}}</td>
                                        <td>N/a yet</td>
                                    </tr>
                                @empty
                                    <h3>Нет данных для вывода ....</h3>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
