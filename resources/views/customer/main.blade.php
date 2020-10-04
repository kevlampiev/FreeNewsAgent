@extends('layouts.customerlayout')
@section('title') @parent Главная @endsection

@section('content')
    <div class="row">
        <div class="col-md-8 ">
            <div class="latest-news-panel">

                <h5> Последние новости </h5>
                @foreach($news as $new)
                    <section>
                        <img
                            src="{{($new->img==null||$new->img=='')?asset('storage/images/articles/no_image.jpg'):$new->img}}"
                            alt="{{'Изобржение '.$new->title}}"
                            class="front-page-img">
                        <a href="{{route('customer.showArticle',[
                                                        $new->slug,
                                                        $new->id
                                                        ])}}">
                            <h6 class="article-header">{{$new->title}}</h6>
                        </a>
                        <h7>{{$new->created_at}} - {{$new->name}}</h7>
                        <div class="clear-div">

                        </div>
                    </section>
                @endforeach

            </div>

        </div>

        <div class="col-md-4 ">

            <div class="about-panel">
                <h5> О проекте </h5>
                <p>
                    Простой агрегатор новостей
                </p>
                <p>
                    Сайт собирает и сортирует информацию популярных российских интернет-ресурсов (Яндекс, Lenta, Взгляд
                    и др) в кратком виде. Перечень ресурсов и новостных тем ежедневно пополняется.
                </p>
                <p>
                    Статьи приводятся на сайте ввиде кратких анонсов, только по существу. При желании можно
                    перейти по ссылке на первоисточник для того, чтобы ознакомиться со статьей в оригинале
                </p>
                <p>
                    Регистрация на сайте дает возможность запрашивать выборки статей из имеющихся в распоряжении материалов
                </p>
            </div>


        </div>

    </div>
@endsection
