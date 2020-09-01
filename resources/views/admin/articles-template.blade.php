

@foreach ($news as $new)

    <div class="article-box" v-pre>
        <div class="article-main-block">
            <img
                src="{{asset('storage/images/articles/'.(basename($new->img)?basename($new->img):'no_image.jpg'))}}"
                alt="Иллюстриция к новости" class="article-illustration">
            <h3 class="article-header">
                {{$new->title}}
            </h3>
            <h4>{{$new->created_at}} - {{$new->category->name}}</h4>
            <h5>
                {{$new->announcement}}
            </h5>
            <p>
                {{$new->article_body}}
            </p>
        </div>
        <div class="article-control-block">
            <a href="{{route('admin.editArticle',['slug'=>$new->category->slug,'article'=>$new->id])}}"
               class="article-control-link">
                <i class="fa fa-edit" aria-hidden="true"></i>
                Изменить
            </a>
            <br>
            <a href="{{route('admin.deleteArticle',['slug'=>$new->category->slug,'article'=>$new->id])}}"
               class="article-control-link delete"
               data-method="POST" data-confirm="Уверены, что хотите удалить эту запись?"
               data-token="{{ csrf_token() }}">
                <i class="fa fa-trash" aria-hidden="true"></i>
                Удалить
            </a>
        </div>
    </div>

@endforeach
{{ $news->links() }}
