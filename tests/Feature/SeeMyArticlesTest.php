<?php

namespace Tests\Feature;

use App\Http\Livewire\UserArticlesComponent;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
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
        $publishedArticle = Article::factory()->create(['user_id' => $user->id, 'publication_date' => now()->subDays(3)]);
        $unpublishedArticle = Article::factory()->create(['user_id' => $user->id, 'publication_date' => now()->addDays(3)]);

        // When the user visits the "My Articles" page and clicks on published, then they should see the published article
        Livewire::test(UserArticlesComponent::class)
            ->call('reload_component', true)
            ->assertSee($publishedArticle->title);

        // When the user visits the "My Articles" page and clicks on unpublished, then they should see the unpublished article
        Livewire::test(UserArticlesComponent::class)
            ->call('reload_component', false)
            ->assertSee($unpublishedArticle->title);
    }

    /**
     * @test
     */
    public function a_guest_does_not_have_access_to_my_articles_page()
    {
        $response = $this->get('/my-articles');
        $response->assertRedirect('/login');
    }






}
