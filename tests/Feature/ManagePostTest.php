<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

it('can display the user index page', function () {
    User::factory(10)->create();

    $response = $this->get(route('user.index'));

    $response->assertStatus(200);
    $response->assertViewIs('users.index');
    $response->assertViewHas('users');
});

it('can display the create user form', function () {
    $response = $this->get(route('user.create'));

    $response->assertStatus(200);
    $response->assertViewIs('users.create');
});

it('can store a new user', function () {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ];

    $response = $this->post(route('user.store'), $data);

    $response->assertRedirect(route('user.index'));
    $response->assertSessionHas('message', 'New user created successfully');

    $this->assertDatabaseHas('users', [
        'email' => 'john.doe@example.com',
    ]);
});

it('can display the edit user form', function () {
    $user = User::factory()->create();

    $response = $this->get(route('user.edit', $user));

    $response->assertStatus(200);
    $response->assertViewIs('users.edit');
    $response->assertViewHas('user', $user);
});

it('can update a user', function () {
    $user = User::factory()->create();

    $data = [
        'name' => 'Updated Name',
        'email' => 'updated.email@example.com',
        'password' => '',
    ];

    $response = $this->put(route('user.update', $user), $data);

    $response->assertRedirect(route('user.index'));
    $response->assertSessionHas('message', 'User updated successfully');

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Updated Name',
        'email' => 'updated.email@example.com',
    ]);
});

it('can delete a user', function () {
    $user = User::factory()->create();

    $response = $this->delete(route('user.destroy', $user));

    $response->assertRedirect(route('user.index'));
    $response->assertSessionHas('message', 'User deleted successfully');

    $this->assertDatabaseMissing('users', [
        'id' => $user->id,
    ]);
});
