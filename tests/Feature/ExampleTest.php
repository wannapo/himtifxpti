<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

<<<<<<< HEAD
        $response->assertRedirect(route('courses.index'));
=======
        $response->assertStatus(200);
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
    }
}
