@extends('layouts.mainlayout')

@section('content')
    <H3>Категории новостей</H3>
    <div class="categories-container">
        @foreach ($categories as $category)

            <div class="newscategory shadowed-box">
                <a href="{{route('articlesOfCategory',[$category['id']])}}" class="mega-anchor">
                    <h5>
                        {{$category['name']}}
                    </h5>
                    <p>
                        {{$category['description']}}
                    </p>
                </a>
            </div>

        @endforeach
    </div>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/categories.css')}}">
@endsection
