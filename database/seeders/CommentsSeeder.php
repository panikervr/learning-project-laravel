<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = News::all();
        foreach ($news as $new) {
            Comment::factory()->count(rand(1, 5))->create([
                'news_id' => $new->id,
            ]);
        }
    }
}
