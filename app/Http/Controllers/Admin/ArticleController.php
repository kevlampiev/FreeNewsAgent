<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\ArticlesCategory;
use App\Models\InfoSource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    //Вспомогательная функция, собирающая данные для редактирования/добавления статьи из формы ввода
    private function getFromForm(Article $article, NewsRequest $request)
    {
        $article->fill($request->except(['_token']));
//        dd($article);
//        if ($request->file('img')) {
//            $newPath = Storage::put('public/images/articles', $request->file('img'));
//            $article->img = Storage::url($newPath);
//        }
        $article->save();
    }

    public function add(string $slug = null)
    {
        $article = new Article([], $slug);
        return view('admin.article-add', [
            'categoryList' => ArticlesCategory::orderBy('name')->get(),
            'sourcesList' => InfoSource::orderBy('name')->get(),
            'article' => $article,
        ]);
    }

//    public function insert(string $slug, NewsRequest $request)
    public function insert(NewsRequest $request)
    {
        $new = new Article();
        try {
            $this->getFromForm($new, $request);
            session()->flash('proceed_status', 'Новость добавлена');
        } catch (\Exception $e) {
            session()->flash('error_message', "Ошибка сервера. {$e->getMessage()}");
        }

        return redirect()->to(session()->get('work_sector'));
    }

    public function edit(string $slug, Article $article)
    {
//        session()->start();
        return view('admin.article-add', [
            'categoryList' => ArticlesCategory::orderBy('name')->get(),
            'sourcesList' => InfoSource::orderBy('name')->get(),
            'article' => $article,
        ]);
    }

    public function update(string $slug, Article $article, NewsRequest $request)
    {

        try {
            $this->getFromForm($article, $request);
            session()->flash('proceed_status', 'Новость изменена');
        } catch (\Exception $e) {
            session()->flash('error_message', "Ошибка сервера. {$e->getMessage()}");
        }

        return redirect()->to(session()->get('work_sector'));
    }

    public function delete(string $slug, Article $article)
    {
        try {
            $article->delete();
            session()->flash('proceed_status', 'Новость удалена');
        } catch (\Exception $e) {
            session()->flash('error_message', "Ошибка сервера. {$e->getMessage()}");
        }
        return redirect()->to(session()->get('work_sector'));
    }
}
