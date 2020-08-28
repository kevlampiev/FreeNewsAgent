@extends('layouts.adminLayout');


@section('content')
    <div class="row">
        {{--        <div class="col-md-1"></div>--}}
        <div class="col-md-7  dashboard-block">
            <h2> Последние опубликованные статьи</h2>
            @include('admin.articles-template')
        </div>
        <div class="col-md-4 dashboard-block">
            <div>
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

            <div>
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
