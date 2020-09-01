@extends('layouts.adminLayout')

@section('title') @parent Запросы пользователей @show

@section('content')

    {{--    @dd($news)--}}

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Дата поступления</th>
            <th scope="col">Электронная почта</th>
            <th scope="col">Телефон</th>
            <th scope="col">Содержание</th>
            <th scope="col">Состояние</th>
            <th scope="col">
                <div>
                    <a href="{{route('infoEnquiries.create')}}" class="btn btn-secondary ">
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Добавить
                    </a>
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($irequests as $req)
            <tr>
                <th scope="row">{{$req->id}}</th>
                <td>{{$req->created_at}}</td>
                <td>{{$req->email}}</td>
                <td>{{$req->phone}}</td>
                <td>{{substr($req->request_body,0,min(30, strlen($req->request_body)))."..."}}</td>
                <td>N/a yet</td>
                <td>
                    <a href="{{route('infoEnquiries.edit',[$req])}}" class="request-control-link">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        Изменить
                    </a>
                    <a
                        href="{{route('infoEnquiries.destroy',[$req])}}"
                        class="request-control-link delete"
                        data-method="DELETE" data-confirm="Уверены, что хотите удалить эту запись?"
                        data-token="{{ csrf_token() }}"
                    >
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Удалить
                    </a>
                </td>
            </tr>
        @empty
            <p>Нет данных для вывода ....</p>
        @endforelse

        </tbody>
    </table>

    {{ $irequests->links() }}
@endsection

@section('scripts')
    <script src="{{asset('js/laravel-post-button.js')}}" defer></script>

@endsection
