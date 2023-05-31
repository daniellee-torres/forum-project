<?php

namespace Tests\Feature;

use App\Http\Livewire\CommentFormComponent;
use App\Http\Livewire\CreateArticleComponent;
use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Livewire\Livewire;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * @test
     */
    public function a_logged_in_user_can_create_an_article()
    {
        //Given we have a signed in user
        //When we a user tries to create an article
        //Then they are allowed to the create article page
        //We should see the newly created article in the my articles page
        //The new Articles exists in the database

        // Given we have a logged-in user
        $user = User::factory()->create();
        // When the user adds a comment to the article
        Livewire::actingAs($user)
            ->test(CreateArticleComponent::class, ['user' => $user])
            ->set('title', 'This is a test title')
            ->set('Body', 'This is a test body')
            ->set('publication_date', Carbon::today())
            ->call('save_article');

        // Then their comment should be added to the article
        $this->assertDatabaseHas('articles', [
            'user_id' => $user->id,
            'title' => 'This is a test title',
            'body' => 'This is a test body'
        ]);
    }
}
