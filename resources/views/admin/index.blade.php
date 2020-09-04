@extends('layouts.adminLayout');


@section('content')
    <div class="row">
        {{--        <div class="col-md-1"></div>--}}
        <div class="col-md-8">
            <div class="dashboard-block">
                <h2> Последние опубликованные новости </h2>
                <div class="ordering-block">
                    <div>
                        <a href="{{route('admin.addArticle','_')}}" class="btn btn-secondary ">
                            <i class="fa fa-plus-square" aria-hidden="true"></i> Добавить
                        </a>
                    </div>
                </div>
                ` @include('admin.articles-template')
            </div>

        </div>
        <div class="col-md-4">
            <div class="dashboard-block">
                <h4>Control block 2</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium corporis dignissimos et
                    expedita
                    fugit, ipsa ipsum iusto maiores non officia optio, quos veritatis voluptate. Facilis fugiat id magni
                    obcaecati odit. Ab accusamus aperiam at doloremque dolores ducimus ea minus molestiae quae
                    veritatis.
                    Aspernatur consectetur culpa dolorum est laboriosam omnis provident qui quia ratione repellendus!
                    Autem
                    commodi eaque hic quasi sed. Aliquid distinctio et, ipsam laudantium molestiae odit quae quos velit.
                </p>
            </div>

            <div class="dashboard-block">
                <h4>Control block 3</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium corporis dignissimos et
                    expedita
                    fugit, ipsa ipsum iusto maiores non officia optio, quos veritatis voluptate. Facilis fugiat id magni
                    obcaecati odit. Ab accusamus aperiam at doloremque dolores ducimus ea minus molestiae quae
                    veritatis.
                    Aspernatur consectetur culpa dolorum est laboriosam omnis provident qui quia ratione repellendus!
                    Autem
                    commodi eaque hic quasi sed. Aliquid distinctio et, ipsam laudantium molestiae odit quae quos velit.
                </p>
            </div>

        </div>
    </div>


@endsection


@section('scripts')
    <script src="{{asset('js/laravel-post-button.js')}}" defer></script>

@endsection
