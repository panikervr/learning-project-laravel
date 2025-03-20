<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreCommentRequest;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Занесение коментария в бд Пост /news/{news}/comment
     */
    public function comment(StoreCommentRequest $request, News $news)
    {
        Comment::create([
            'news_id' => $news->id,
            'user_id' => $request->user()->id,
            'name' => $request->user()->name,
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('pages.news.show', ['news' => $news->id])->with('success', 'Комментарий успешно добавлен!');
    }
}
