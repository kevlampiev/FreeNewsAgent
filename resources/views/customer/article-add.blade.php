@extends('mainlayout')

@section('content')

    <div class="article-container shadowed-box">
        <form method="POST">
            <div class="form-group">
                <label for="title">Заголовок статьи</label>
                <input type="text" class="form-control" id="title">
            </div>

            <div class="form-group">
                <label for="category">Категория новости</label>
                <select class="form-control" id="category">
                    @foreach($categoryList as $cat)
                        <option value="{{$cat['id']}}"
                                @if ($cat['id']==$category['id'])
                                selected
                            @endif
                        >{{$cat['name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Текст статьи</label>
                <textarea class="form-control" id="description" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{route('articlesOfCategory',[$category['id']])}}"
               class="btn btn-secondary ">
                Отмена
            </a>
        </form>
    </div>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/article.css')}}">
@endsection
