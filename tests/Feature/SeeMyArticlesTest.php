<?php

namespace Tests\Feature;

use App\Http\Livewire\UserArticlesComponent;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SeeMyArticlesTest extends testcase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function logged_in_user_can_see_their_articles_on_my_articles_page()
    {
        // Given we have a logged-in user
        $user = User::factory()->create();
        Livewire::actingAs($user);

        // And the user has some articles
        $publishedArticles = Article::factory()->count(3)->create(['user_id' => $user->id, 'published' => true]);
        $unpublishedArticles = Article::factory()->count(2)->create(['user_id' => $user->id, 'published' => false]);

        // When the user visits the "My Articles" page
        $response = Livewire::test(UserArticlesComponent::class);

        // Then the user should see their articles (both published and unpublished)
        foreach ($publishedArticles as $article) {
            $response->assertSee($article->title);
        }

        foreach ($unpublishedArticles as $article) {
            $response->assertSee($article->title);
        }
    }



}
