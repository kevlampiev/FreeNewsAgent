<?php

namespace App\Http\Controllers\Admin;

use App\Models\Articles;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\ArticlesCategory;
use App\Models\InfoSources;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class ArticlesController extends Controller
{
    //Вспомогательная функция, собирающая данные для редактирования/добавления статьи из формы ввода
    private function getFromForm(Articles $article, NewsRequest $request)
    {
        $article->fill($request->except(['_token', 'img']));
        if ($request->file('img')) {
            $newPath = Storage::put('public/images/articles', $request->file('img'));
            $article->img = Storage::url($newPath);
        }
        $article->save();
    }

    public function add(string $slug = null)
    {
        $article = new Articles([], $slug);
        return view('admin.article-add', [
            'categoryList' => ArticlesCategory::orderBy('name')->get(),
            'sourcesList' => InfoSources::orderBy('name')->get(),
            'article' => $article,
        ]);
    }

//    public function insert(string $slug, NewsRequest $request)
    public function insert(NewsRequest $request)
    {
        $new = new Articles();
        try {
            $this->getFromForm($new, $request);
            session()->flash('proceed_status', 'Новость добавлена');
        } catch (\Exception $e) {
            session()->flash('error_message', "Ошибка сервера. {$e->getMessage()}");
        }
        if (session()->get('work_sector') == 'admin') {
            return redirect()->route(session()->get('work_sector'));
        } else {
            return redirect()->route(session()->get('work_sector'), ['slug' => $new->category->slug]);
        }
    }

    public function edit(string $slug, Articles $article)
    {
//        session()->start();
        return view('admin.article-add', [
            'categoryList' => ArticlesCategory::orderBy('name')->get(),
            'sourcesList' => InfoSources::orderBy('name')->get(),
            'article' => $article,
        ]);
    }

    public function update(string $slug, Articles $article, NewsRequest $request)
    {

        try {
            $this->getFromForm($article, $request);
            session()->flash('proceed_status', 'Новость изменена');
        } catch (\Exception $e) {
            session()->flash('error_message', "Ошибка сервера. {$e->getMessage()}");
        }

        if (session()->get('work_sector') == 'admin') {
            return redirect()->route(session()->get('work_sector'));
        } else {
            return redirect()->route(session()->get('work_sector'), ['slug' => $slug]);
        }
    }

    public function delete(string $slug, Articles $article)
    {
        try {
            $article->delete();
            session()->flash('proceed_status', 'Новость удалена');
        } catch (\Exception $e) {
            session()->flash('error_message', "Ошибка сервера. {$e->getMessage()}");
        }
        if (session()->get('work_sector') == 'admin') {
            return redirect()->route(session()->get('work_sector'));
        } else {
            return redirect()->route(session()->get('work_sector'), ['slug' => $slug]);
        }
    }
}
