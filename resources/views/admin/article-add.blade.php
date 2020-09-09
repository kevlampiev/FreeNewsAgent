@extends('layouts.adminLayout')

@section('title') @parent Изменение новости @endsection

@section('content')

    <div v-pre>

    </div>

    <div class="article-container shadowed-box" v-pre>
        <form method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group {{$errors->has('title')?'has-error':''}}">

                        <label for="title">Заголовок статьи</label>
                        @if ($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('title') as $err)
                                    {{ $err}} <br>
                                @endforeach
                            </div>
                        @endif

                        <input class="form-control" id="title" name="title" type="text"
                               value="{{(count($errors)>0)?old('title'):$article->title}}">
                    </div>

                    <div class="form-group">
                        <label for="category">Категория новости</label>
                        <select class="form-control" id="category" name="category_id">
                            @foreach($categoryList as $cat)
                                <option value="{{$cat->id}}"
                                        @if ($cat->id==(old('category_id')??$article->category_id)) selected @endif>
                                    {{$cat->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group {{$errors->has('announcement')?'has-error':''}}">
                        <label for="announcement">Аннотация</label>
                        @if ($errors->has('announcement'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('announcement') as $err)
                                    {{ $err}} <br>
                                @endforeach

                            </div>
                        @endif
                        <textarea class="form-control" id="announcement" rows="3"
                                  name="announcement">{{(count($errors)>0)?old('announcement'):$article->announcement}}</textarea>
                    </div>

                    <div class="form-group {{$errors->has('article_body')?'has-error':''}}" v-pre>
                        <label for="description">Текст статьи</label>
                        @if ($errors->has('article_body'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('article_body') as $err)
                                    {{ $err}} <br>
                                @endforeach
                            </div>
                        @endif
                        <textarea class="form-control" id="description" rows="10"
                                  name="article_body">{{(count($errors)>0)?old('article_body'):$article->article_body}}</textarea>
                    </div>

                </div>
            </div>
            <input type="hidden" name="guid" value="{{old('guid')??$article->guid}}">
            <div class="row">
                <div class="col-md-6">

                    <h6>
                        Основное изображение
                    </h6>
                    <img
                        @if (old('img'))
                        src="{{old('img')}}"
                        @elseif ($article->img)
                        src="{{$article->img}}"
                        @else
                        src="{{asset('storage/images/articles/no_image.jpg')}}"
                        @endif
                        alt="Иллюстриция к новости" class="icon-img" id="atclImg">

                    <div class="input-group">
                        <label for="thumbnail"></label>

                        <span class="input-group-btn ">
                         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-outline-secondary">
                           <i class="fa fa-picture-o"></i> Choose
                         </a>
                       </span>

                        <input id="thumbnail" class="form-control" type="text" name="img"
                               value="{{old('img')??$article->img}}"
                               onchange="showPicture()">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="source_id">Источник информации</label>

                        <select class="form-control" id="source_id" name="source_id">
                            @foreach($sourcesList as $source)
                                <option
                                    value="{{$source->id}}"
                                    @if ($source->id==(old('source_id')??$article->source_id)) selected @endif>
                                    {{$source->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group {{$errors->has('link')?'has-error':''}}">

                        <label for="link">Ссылка на новость</label>
                        @if ($errors->has('link'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('title') as $err)
                                    {{ $err}} <br>
                                @endforeach
                            </div>
                        @endif

                        <input class="form-control" id="link" name="link" type="text"
                               value="{{(count($errors)>0)?old('link'):$article->link}}">
                    </div>

                    <div class="form-group">

                        <input type="checkbox" id="isprivate" name="is_private"
                               {{((old('is_private')=='1')||($article->is_private==1))?'checked':''}}
                               value="1">

                        <label class="form-check-label" for="isprivate">
                            Новость приватная
                        </label>
                    </div>

                </div>
            </div>


            <button type="submit" class="btn btn-primary">Сохранить</button>

            <a href="{{session()->get('work_sector')}}"
               class="btn btn-secondary ">
                Отмена
            </a>
        </form>
    </div>
@endsection

@section('scripts')

    {{--    TODO Вынести вс отдельным модуль. перекомпилировать  --}}
    {{--    TODO Загрузить jquery c собственного сервера, не с CDN --}}
    {{--    TODO Загрузить ckeditor c собственного сервера, не с CDN --}}
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        let options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        }

        function showPicture() {
            document.getElementById('atclImg').src = document.getElementById('thumbnail').value
            console.log('Картинка изменена')
        }

        CKEDITOR.replace('description', options);

        let route_prefix = "/laravel-filemanager";
        $('#lfm').filemanager('image', {prefix: route_prefix});


    </script>





@endsection
