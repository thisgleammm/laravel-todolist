<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class TodolistServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    private TodolistService $todolistService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->todolistService = $this->app->make(TodolistService::class);
    }

    public function testTodolistNotNull()
    {
        $this->assertNotNull($this->todolistService);
    }

    public function testSaveTodo()
    {
        $this->todolistService->saveTodo("1", "Test");

        $todolist = Session::get("todolist");
        foreach ($todolist as $value) {
            $this->assertEquals("1", $value["id"]);
            $this->assertEquals("Test", $value["todo"]);
        }
    }
    public function testGetTodoEmpty()
    {
        assertEquals([], $this->todolistService->getTodo());
    }
    public function testGetTodoNotEmpty()
    {
        $expected = [
            [
                "id" => "1",
                "todo" => "Test",
            ],
            [
                "id" => "2",
                "todo" => "Test2",
            ],
        ];
        $this->todolistService->saveTodo("1", "Test");
        $this->todolistService->saveTodo("2", "Test2");
        assertEquals($expected, $this->todolistService->getTodo());
    }

    public function testRemoveTodo()
    {
        $this->todolistService->saveTodo("1", "Test");
        $this->todolistService->saveTodo("2", "Test2");
        
        self::assertEquals(2, sizeof($this->todolistService->getTodo()));
        
        $this->todolistService->removeTodo("3");
        
        self::assertEquals(2, sizeof($this->todolistService->getTodo()));

        $this->todolistService->removeTodo("1");
        
        self::assertEquals(1, sizeof($this->todolistService->getTodo()));
        
        $this->todolistService->removeTodo("2");
        
        self::assertEquals(0, sizeof($this->todolistService->getTodo()));
    }
}
