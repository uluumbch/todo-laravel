<?php

test('the application shows the todo list', function () {
    $response = $this->get('/todo');

    $response->assertSee('Your task management app');
});

test('the application can create a new todo', function () {
    $response = $this->post('/todo', [
        'name' => 'New Todo',
        'description' => 'This is a new todo item'
    ]);

    $response->assertRedirect('/todo');
    $this->assertDatabaseHas('todos', ['name' => 'New Todo', 'description' => 'This is a new todo item']);
});

test('the description field is optional when creating a todo', function () {
    $response = $this->post('/todo', [
        'name' => 'Todo without description'
    ]);

    $response->assertRedirect('/todo');
    $this->assertDatabaseHas('todos', ['name' => 'Todo without description', 'description' => null]);
});