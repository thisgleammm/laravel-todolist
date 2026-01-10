<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodolist()
    {
        $this->withSession([
            "user" => "gleam",
            "todolist" => [
                [
                    "id" => 1,
                    "todo" => "Learn Laravel",
                ],
                [
                    "id" => 2,
                    "todo" => "Learn Livewire",
                ],
            ]
        ]);
        $this->get('/todolist')
        ->assertSeeText("1")
        ->assertSeeText("Learn Laravel")
        ->assertSeeText("2")
        ->assertSeeText("Learn Livewire");
    }

    public function testAddTodoFailed()
    {
        $this->withSession([
            "user" => 'gleam'
        ]);
        $this->post('/todolist', [])
            ->assertSeeText('Todo is required');
    }
    public function testAddTodoSuccess()
    {
        $this->withSession([
            "user" => 'gleam'
        ]);
        $this->post('/todolist', [
            "todo" => 'Learn Laravel'
        ])
            ->assertRedirect('/todolist');
    }
}
