<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_log()
    {

        $response = $this->postJson(route('auth.login'), [
            'email' => 'regular@test.fr',
            'password' => 'anya'
        ])
        ->assertOk();

        $this->assertArrayHasKey('token', $response->json());
    }
    public function test_user_cant_log_with_wrong_email()
    {

        $response = $this->postJson(route('auth.login'), [
            'email' => 'regular',
            'password' => 'anya'
        ])
            ->assertUnauthorized();
    }



}

