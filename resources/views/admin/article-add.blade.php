@extends('layouts.adminLayout')

@section('title') @parent Изменение новости @endsection

@section('content')

    <div v-pre>

    </div>

    <div class="article-container shadowed-box" v-pre>
        <form method="POST"
              enctype="multipart/form-data">
            @csrf

            <div class="form-group">

                <input type="checkbox" id="isprivate" name="is_private"
                       {{((old('is_private')=='1')||($article->is_private==1))?'checked':''}}
                       value="1">

                <label class="form-check-label" for="isprivate">
                    Новость приватная
                </label>
            </div>

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
                        <option value="{{$cat->id}}" @if ($cat->id==(old('category_id')??$article->category_id)) selected @endif>
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

            <div class="form-group {{$errors->has('article_body')?'has-error':''}}">
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

            <div class="form-group">
                <img
                    @if (old('tmp_imp_path'))
                    src="{{old('tmp_imp_path')}}"
                    @elseif ($article->img)
                    src="{{asset('storage/images/articles/'.basename($article->img))}}"
                    @else
                    src="{{asset('storage/images/articles/no_image.jpg')}}"
                    @endif
                    alt="Иллюстриция к новости" class="icon-img" id="atclImg">

                <input type="file" accept="image/*" onchange="loadFile(event)" name="img">
                <input type="hidden" name="tmp_imp_path" id="tmp_imp_path">
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
    <script>

        function loadFile(event) {
            let output = document.getElementById('atclImg')
            output.src = URL.createObjectURL(event.target.files[0])
            let hiddenInp = document.getElementById('tmp_imp_path')
            hiddenInp.value = URL.createObjectURL(event.target.files[0])

            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        }
    </script>
@endsection
