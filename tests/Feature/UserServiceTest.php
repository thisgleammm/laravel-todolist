<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertFalse;

class UserServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    private UserService $userService;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = $this->app()->make(UserService::class);
    }

    public function testLoginSucess()
    {
        self::assertTrue($this->userService->login("gleam", "secret"));
    }

    public function testLoginUserNotFound()
    {
        assertFalse($this->userService->login("user", "password"));
    }

    public function testLoginPasswordIncorrect()
    {
        assertFalse($this->userService->login("gleam", "wrong"));
    }
}
