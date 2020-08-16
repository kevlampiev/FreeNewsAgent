@extends('layouts.mainlayout')

@section('title') @parent Категории новостей @show

@section('content')
    <H3>Категории новостей</H3>
    <div class="categories-container">
        @foreach ($categories as $category)

            <div class="newscategory shadowed-box">
                <a href="{{route('customer.articlesOfCategory',[$category->slug])}}" class="mega-anchor">
                    <h5 class="article-header">
                        {{$category->name}}
                    </h5>
                    <p>
                        {{$category->description}}
                    </p>
                </a>
            </div>

        @endforeach
    </div>
@endsection

{{--@section('stylesheets')--}}
{{--    <link rel="stylesheet" href="{{asset('css/categories.css')}}">--}}
{{--@endsection--}}
