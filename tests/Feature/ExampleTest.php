<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_legacy_extensionless_page_returns_a_successful_response(): void
    {
        $response = $this->get('/faq');

        $response->assertStatus(200);
    }

    public function test_unknown_legacy_page_returns_not_found(): void
    {
        $response = $this->get('/missing-page');

        $response->assertNotFound();
    }
}
