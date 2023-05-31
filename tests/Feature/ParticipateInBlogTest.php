<?php

namespace Tests\Feature;

use App\Http\Livewire\CommentComponent;
use App\Http\Livewire\CommentFormComponent;
use App\Http\Livewire\FullArticleComponent;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ParticipateInBlogTest extends testcase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    /**
     * @test
     */
    public function an_authenticated_user_can_add_comments_to_an_article()
    {
        // Given we have a logged-in user
        $user = User::factory()->create();

        // And an existing article
        $article = Article::factory()->create();

        // When the user adds a comment to the article
        Livewire::actingAs($user)
            ->test(CommentFormComponent::class, ['articleId' => $article->id, 'user' => $user])
            ->set('comment', 'This is a test comment')
            ->call('postComment');

        // Then their comment should be added to the article
        $this->assertDatabaseHas('comments', [
            'article_id' => $article->id,
            'user_id' => $user->id,
            'body' => 'This is a test comment',
        ]);
    }

    /**
     * @test
     */
    public function an_unauthenticated_user_can_not_add_comments()
    {
        $article = Article::factory()->create();

        // Given we have an article with comments
        $comment = Comment::factory()->create([
            'article_id' => $article->id
        ]);

        // When a guest visits that article's comment page, they will be redirected back to the article page.
        $response = $this->get(route('comment', ['articleId' => $article->id]))
            ->assertDontSeeLivewire('comment-form-component');
    }



}
