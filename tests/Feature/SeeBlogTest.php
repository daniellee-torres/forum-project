<?php

namespace Tests\Feature;

use App\Http\Livewire\SummarizedArticleComponent;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SeeBlogTest extends testcase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function any_user_can_browse_all_articles()
    {
        //Given I made an Article
        $article = Article::factory()->create();
        // When I am at the main page, then I should see that article
        $response = $this->get(route('home'))->assertSeeLivewire('blog-component', $article);
        $response->assertSee($article->title)
            ->assertSee($article->summary);
    }

    /**
     * @test
     */
    public function a_user_can_see_an_individual_article_by_clicking_on_article_title()
    {
        // Given I have an article
        $user = User::factory()->create();
        $article = Article::factory()->create(['user_id' => $user->id]);

        // When I click on the title, Then I should see the individual article in its page
        $response = $this->get("/articles/{$article->id}");

        // Assert that the response is successful and contains the article title
        $response->assertStatus(200);
        $response->assertSee($article->title);
    }

    /**
     * @test
     */
    public function a_user_can_read_comments_associated_to_an_article()
    {
        // Given we have an article with comments
        $article = Article::factory()->create();
        $comment = Comment::factory()->create([
            'article_id' => $article->id
        ]);
        // When a user visits that article's page, Then they will see the comments for that article
        $response = $this->get(route('article', ['articleId' => $article->id]))
            ->assertSeeLivewire('full-article-component', ['article' => $article])
            ->assertSee($comment->body);
    }

    /**
     * @test
     */
    public function a_message_is_displayed_when_there_are_no_articles()
    {
        $this->get('/')->assertSee('No articles yet, comeback later!');
    }







}
