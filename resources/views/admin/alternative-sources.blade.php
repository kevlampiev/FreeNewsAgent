@extends('layouts.adminLayout')

@section('title') @parent Источники информации @show

@section('content')
    <h2>Альтернативные истоники новостей, сделанные через Storage </h2>

    <div class="ordering-block">
        <div>
            <a href="{{route('admin.AddAlternativeSource')}}" class="btn btn-secondary ">
                <i class="fa fa-plus-square" aria-hidden="true"></i> Добавить
            </a>
        </div>
    </div>

    <div class="source-container">


        @forelse ($sources as $key=>$source)

            <div class="source-card shadowed-box">
                <h5>
                    {{$source->name}}
                </h5>
                <p>
                    {{$source->url}}
                </p>
                <p>
                    {{$source->description}}
                </p>
                <div class="category-control-block">
                    <a href="{{route('admin.EditAlternativeSource',['id'=>$key])}}" class="article-control-link">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        Изменить
                    </a>
                    <a href="{{route('admin.DeleteAlternativeSource',['id'=>$key])}}"
                       class="article-control-link delete"
                       data-method="POST" data-confirm="Уверены, что хотите удалить эту запись?"
                       data-token="{{ csrf_token() }}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Удалить
                    </a>
                </div>
            </div>

        @empty
            <p> нет данных для отображения </p>
        @endforelse
    </div>
@endsection


@section('scripts')
    <script src="{{asset('js/laravel-post-button.js')}}" defer></script>
@endsection
