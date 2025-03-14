<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreCommentRequest;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Вывод всех новостей /news
     */
    public function index()
    {
        $news = News::wherePublished(true)
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->select('news.*', 'news_categories.name as category_name', 'users.name as username', 'users.email')
            ->orderBy('id', 'desc')->paginate(6);
        //dd($news->links());

     //   $news = News::wherePublished(true)->orderBy('id', 'desc')->paginate(10);
        return view('pages.news.index', ['news' => $news]);
    }
    /**
     * Создание новости Гет /news/create
     */
    public function create()
    {
        $categories = Category::query()->get();

        return view('pages.news.create', ['categories' => $categories]);
    }
    /**
     * Занесение новости в бд Пост /news/store
     */
    public function store(StoreNewsRequest $request)
    {
//        if($request->hasFile('image')) {
//            $imagePath = config('app.url') . "/storage/{$request->file('image')->store('film/previews','public')}";
//        }
        $news = News::create([
           'title' => $request->input('title'),
           'content' => $request->input('content'),
           'published' => !empty($request->has('published')) ? 1 : 0,
            'user_id' => 1,
            'category_id' => $request->input('category'),
            //'image' => $imagePath ?? null,
        ]);
        return redirect()->route('pages.news.show', ['news' => $news->id])->with('success', 'Новость успешно создана');
    }

    /**
     * Вывод одной новостей /news/{news}
     */
    public function show(News $news)
    {
        return view('pages.news.show', ['news' => $news, 'comments' => $news->comments, 'category' => $news->category]);
    }

    /**
     * Редактирование одной новостей Гет /news/{news}/edit
     */
    public function edit(News $news)
    {
        $categories = Category::query()->get();
        return view('pages.news.edit', ['news' => $news, 'categories' => $categories]);
    }

    /**
     * Изменение одной новостей Пост /news/{news}/update
     */
    public function update(UpdateNewsRequest $request, News $news): \Illuminate\Http\RedirectResponse
    {
        $news->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'published' => !empty($request->has('published')) ? 1 : 0,
            'user_id' => 1,
        ]);
        return redirect()->route('pages.news.show', ['news' => $news->id])->with('success', 'Новость успешно отредактирована!');
    }
    /**
     * Мягкое удаление новостей /news/{news}/destroy
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('pages.news.index')->with('success', 'Новость успешно удалена!');
    }
    /**
     * Занесение коментария в бд Пост /news/{news}/comment
     */
    public function comment(StoreCommentRequest $request, News $news)
    {
        //dd($request->all());
        Comment::create([
            'news_id' => $news->id,
            'user_id' => 1,
            'name' => $request->input('name'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('pages.news.show', ['news' => $news->id])->with('success', 'Комментарий успешно добавлен!');
    }
}
