

@extends('layouts.mainlayout')

@section('content')
    <H3>Липовые источники информации</H3>
    <div class="categories-container">
        @foreach ($infoSources as $key=>$infoSource)

            <div class="newscategory shadowed-box">
                    <h5>
                        {{$infoSource['name']}}
                    </h5>
                    <p>
                        {{$key}}
                        <br>
                        {{$infoSource['url']}}
                    </p>
            </div>

        @endforeach
    </div>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/article.css')}}">

@endsection

@section('scripts')
    <script src="{{asset('js/bootstrap-formhelpers-phone.js')}}"></script>
@endsection
