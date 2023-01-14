<?php

namespace Tests\Feature\Health;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HealthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_health_alive()
    {
        $response = $this->get(route('health.alive'));
        $response->assertStatus(200);
        $response->assertContent("Hello");
    }
}
