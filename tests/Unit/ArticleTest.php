<?php
namespace Tests\Unit;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_article_has_comments()
    {
        $article = Article::factory()->create();
        $this->assertInstanceOf(Collection::class, $article->comments);
    }

    /**
     * @test
     */
    public function an_article_has_a_creator()
    {
        $article = Article::factory()->create();
        $this->assertInstanceOf(User::class, $article->user);
    }




}
