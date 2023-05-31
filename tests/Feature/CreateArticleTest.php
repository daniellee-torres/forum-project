<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{
    /**
     * @test
     */
    public function a_logged_in_user_can_create_an_article()
    {
        //Given we have a signed in user
        //When we a user tries to create an article
        //Then they are allowed to the create article page
        //We should see the newly created article in the my articles page
    }
}
