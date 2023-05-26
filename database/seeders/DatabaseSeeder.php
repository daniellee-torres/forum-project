<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $articles = Article::factory(50)->create();

         $articles->each(function($article){
             Comment::factory(10)->create(['article_id' => $article->id]);
         });
    }
}
