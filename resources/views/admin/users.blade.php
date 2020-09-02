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
            <th scope="col">Роль</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{($user->is_admin==1)?"Администратор":"--"}}</td>
                <td>
                    @if ($user->name!=Auth::user()->name)
                        <form method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            @if ($user->is_admin==0)
                                <button type="submit" class="btn btn-outline-danger btn-sm btn-block">
                                    Назначить администратором
                                </button>
                            @else
                                <button type="submit" class="btn btn-outline-primary btn-sm btn-block">
                                    Снять права администратора
                                </button>
                            @endif
                        </form>
                    @endif
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
