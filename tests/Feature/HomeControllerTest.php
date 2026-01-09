<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGuest(): void
    {
        $this->get("/")
            ->assertRedirect("/login");
    }
    public function testMember(): void
    {
        $this->withSession([
            "user" => "gleam",
        ])->get("/")
            ->assertRedirect("/todolist");
    }
}
