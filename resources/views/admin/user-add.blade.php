@extends('layouts.adminLayout')

@section('title') @parent Пользователи @show

@section('content')

    <div class="tab-content">
        <div class="tab-pane fade show active" id="personal-data">
            <div class="card shadowed-box">
                <div class="card-header">Редактирование информации о пользователе</div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        @include('auth.userinfo-template');

                        <div class="form-group row">
                            <div class="col-md-6 offset-4">
                                <input type="checkbox" id="is_admin" name="is_admin"
                                       {{((old('is_admin')=='1')||($user->is_admin==1))?'checked':''}}
                                       value="1"
                                       @if($user->type_auth!='site') disabled @endif
                                >

                                <label class="form-check-label" for="is_admin">
                                    Является администратором
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                                <a href="{{route('admin.usersList')}}" class="btn btn-outline-secondary">Отмена</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

@endsection

{{--@section('scripts')--}}
{{--    <script src="{{asset('js/laravel-post-button.js')}}" defer></script>--}}

{{--@endsection--}}
