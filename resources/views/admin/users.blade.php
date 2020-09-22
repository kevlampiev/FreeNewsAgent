@extends('layouts.adminLayout')

@section('title') @parent Пользователи @show

@section('content')

    {{--    @dd($news)--}}

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Электронная почта</th>
            <th scope="col">Дата регистрации</th>
            <th scope="col">Тип аутентификации</th>
            <th scope="col">Роль</th>
            <th scope="col"></th>
            <th scope="col">
                <a href="{{route('admin.addUser')}}" class="btn btn-secondary ">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Добавить пользователя
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->type_auth}}</td>
                <td>{{($user->is_admin==1)?"ADMIN":"--"}}</td>
                <td>
                    @if ($user->type_auth=="site")
                        <form method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            @if ($user->is_admin==0)
                                <button type="submit" class="btn btn-outline-danger btn-block">
                                    <i class="fa fa-adn" aria-hidden="true">Назначить админ-ом</i>
                                </button>
                            @else
                                <button type="submit" class="btn btn-outline-dark btn-block">
                                    <i class="fa fa-adn" aria-hidden="true">Снять права</i>
                                </button>
                            @endif

                        </form>
                    @endif
                </td>
                <td>
                    <a href="{{route('admin.editUser',['user'=>$user])}}" class="btn btn-outline-dark">
                        <i class="fa fa-pencil-square-o" aria-hidden="true">Изменить</i>
                    </a>
                    <a href="#" class="btn btn-outline-dark">
                        <i class="fa fa-trash-o" aria-hidden="true">Удалить</i>
                    </a>
                </td>
            </tr>
        @empty
            <p>Нет данных для вывода ....</p>
        @endforelse

        </tbody>
    </table>

    {{ $users->links() }}
@endsection

{{--@section('scripts')--}}
{{--    <script src="{{asset('js/laravel-post-button.js')}}" defer></script>--}}

{{--@endsection--}}
