<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SoalControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_middleware_auth(): void
    {
        $response = $this->get('/soal');
        $response->assertRedirect('login');
    }

    public function test_crud_soal_working()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/soal');
        $response->assertOk();
    }
}
