@extends('layouts.adminLayout')

@section('title') @parent Источники информации @show

@section('content')

    <div class="source-container">

        @foreach ($sources as $source)

            <div class="source-card shadowed-box">
{{--                <a href="{{route('articlesOfCategory',[$category->id])}}" class="mega-anchor">--}}
                    <h5>
                        {{$source->name}}
                    </h5>
                    <p>
                        {{$source->http_address}}
                    </p>
                    <p>
                        {{$source->description}}
                    </p>
{{--                </a>--}}
            </div>

        @endforeach
    </div>
@endsection

{{--@section('stylesheets')--}}
{{--    <link rel="stylesheet" href="{{asset('css/categories.css')}}">--}}
{{--@endsection--}}
