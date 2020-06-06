@extends('layouts.mainlayout')

@section('content')
    <div class="row">
        <div class="col-md-8 ">
            <div class="about-panel">
                <h5> О проекте </h5>
                <p>
                    Сугубо тренировочный проект, каких миллиарды во Вселенной. Без претензий
                </p>
                <p>
                    Благодаря появлению агрегаторов россияне стали чаще пользоваться услугами такси, говорится в отчете.
                    Если в 2012 году, до массового распространения агрегаторов, москвичи в среднем заказывали такси
                    шесть раз в месяц, а всего им пользовались 335 тыс. человек, то в 2018 году один человек заказывал
                    такси уже десять раз в месяц, суммарно же услугой пользовались около 2 млн человек. Всего в 2019
                    году таксисты осуществили 324 млн поездок.

                    Подробнее на
                    <a href="""https://www.rbc.ru/technology_and_media/26/02/2020/5e54f7769a79470237941235"> РБК</a>
                </p>
            </div>

        </div>
        <div class="col-md-4 ">
            <div class="latest-news-panel">

                <h5> Последние новости </h5>
                @foreach($news as $new)
                    <section>
                        <a href="{{route('showArticle',[
                                                        $new->category_id,
                                                        $new->id
                                                        ])}}">
                            <h6>{{$new->title}}</h6>
                        </a>
                        <h7>{{$new->created_at}} - {{$new->name}}</h7>
                    </section>
                @endforeach

            </div>

        </div>

    </div>
@endsection
