<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SocialAuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test social auth redirect routes
     */
    public function test_social_auth_redirect_routes_exist()
    {
        $providers = ['google', 'github', 'facebook'];

        foreach ($providers as $provider) {
            $response = $this->get("/auth/{$provider}/redirect");
            
            // Should redirect to the social provider
            $this->assertTrue($response->isRedirection());
        }
    }

    /**
     * Test invalid provider returns 404
     */
    public function test_invalid_provider_returns_404()
    {
        $response = $this->get('/auth/invalid-provider/redirect');
        $response->assertStatus(404);
    }

    /**
     * Test social auth routes are accessible
     */
    public function test_social_auth_routes_are_accessible()
    {
        $providers = ['google', 'github', 'facebook'];

        foreach ($providers as $provider) {
            // Test redirect route
            $this->assertTrue(
                route('social.redirect', $provider) !== null,
                "Social redirect route for {$provider} should exist"
            );

            // Test callback route
            $this->assertTrue(
                route('social.callback', $provider) !== null,
                "Social callback route for {$provider} should exist"
            );
        }
    }
}
