<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testLogin()
    {
        $user = User::factory()->create([
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        $response = $this->post('/login/authenticate', [
            'email' => 'admin@mail.com',
            'password' => '12345678',
        ]);

        $response->assertRedirect('/dashboard')->assertSessionHas('email', 'admin@mail.com')->assertSessionHas('password', '12345678');
        $this->assertAuthenticatedAs($user);
    }

    public function test_logout()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->get('/logout')->assertRedirect('/login')->assertSessionMissing('email'); // Adjust the redirect URL as per your logout behavior
        $this->assertGuest();
    }
}
