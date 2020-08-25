@extends('layouts.adminLayout')

@section('title') @parent Категории новостей @show

@section('content')
    <div class="ordering-block">
        <div>
            <a href="{{route('admin.addCategory')}}" class="btn btn-secondary ">
                <i class="fa fa-plus-square" aria-hidden="true"></i> Добавить
            </a>
        </div>
    </div>

    <div class="categories-container">
        @foreach ($categories as $category)

            <div class="newscategory shadowed-box">
                <a href="{{route('admin.articlesOfCategory',[$category->slug])}}" class="mega-anchor">
                    <h5 class="article-header">
                        {{$category->name}}
                    </h5>
                    <div class="description_block">
                        {{$category->description}}
                    </div>

                    <div class="category-control-block">
                        <div class="control-block-item-left">
                            Количество статей: <em>{{$category->articles_count}}</em>
                        </div>

                        <div class="control-block-item-right">
                            <a href="{{route('admin.editCategory',[$category])}}" class="article-control-link">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                                Изменить
                            </a>
                            <a
                                @if ($category->articles_count==0)
                                href="{{route('admin.deleteCategory',[$category])}}"
                                class="article-control-link delete"
                                data-method="POST" data-confirm="Уверены, что хотите удалить эту запись?"
                                data-token="{{ csrf_token() }}"
                                @else
                                href="#"
                                class="article-control-link disabled-btn"
                                onclick="alert('Нельзя удалить категорию: есть дочерие записи')"
                                @endif
                            >
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                Удалить
                            </a>
                        </div>


                    </div>

                </a>
            </div>

        @endforeach
    </div>
@endsection


@section('scripts')
    <script src="{{asset('js/laravel-post-button.js')}}" defer></script>
@endsection
