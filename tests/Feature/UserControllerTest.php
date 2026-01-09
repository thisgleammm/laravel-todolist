<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testLoginPage(): void
    {
        $this->get('/login')
            ->assertSeeText("Login");
    }
    public function testLoginPageForMember(): void
    {
        $this->withSession([
            'user' => 'gleam',
        ])->get('/login')
            ->assertRedirect('/');
    }

    public function testLoginSuccess()
    {
        $this->post('/login', [
            'user' => 'gleam',
            'password' => 'secret'
        ])
            ->assertRedirect('/')
            ->assertSessionHas("user", "gleam");
    }
    public function testLoginForUserAlreadyLogin()
    {
        $this->withSession([
            "user" => "gleam",
        ])->post('/login', [
            'user' => 'gleam',
            'password' => 'secret'
        ])
            ->assertRedirect('/');
    }

    public function testLoginValidationErro()
    {
        $this->post('/login', [])
            ->assertSeeText("User and password are required");
    }
    public function testLoginFailed()
    {
        $this->post('/login', [
            'user' => 'gleam',
            'password' => 'wrong'
        ])
            ->assertSeeText("Invalid user or password");
    }
    public function testLogout()
    {
        $this->withSession([
            'user' => 'gleam',
        ])->post('/logout')
            ->assertRedirect('/')
            ->assertSessionMissing("user");
    }
    public function testLogoutGuest()
    {
        $this->post('/logout')
            ->assertRedirect('/');
    }
}
