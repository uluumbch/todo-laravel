<?php

use App\Models\User;

test('the application shows the todo list', function () {
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)->get('/todo');

    $response->assertSee('Todo');
});

test('the application can create a new todo', function () {
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)->post('/todo', [
        'name' => 'New Todo',
        'description' => 'This is a new todo item'
    ]);

    $response->assertRedirect('/todo');
    $this->assertDatabaseHas('todos', [
        'name' => 'New Todo', 
        'description' => 'This is a new todo item',
        'user_id' => $user->id
    ]);
});

test('the description field is optional when creating a todo', function () {
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)->post('/todo', [
        'name' => 'Todo without description'
    ]);

    $response->assertRedirect('/todo');
    $this->assertDatabaseHas('todos', [
        'name' => 'Todo without description', 
        'description' => null,
        'user_id' => $user->id
    ]);
});