<?php

declare(strict_types=1);

use App\Models\User;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

test('users can register', function () {
    $response = $this->postJson('api/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertStatus(201);
    $response->assertJson([
        'message' => 'Registration successful.',
    ]);
});

test('users can not register with existing email', function () {
    User::factory()->create([
        'email' => 'test@example.com',
    ]);

    $response = $this->postJson('api/register', [
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors([
        'email' => ['The email has already been taken.'],
    ]);
});

test('users can not register with invalid password', function () {
    $response = $this->postJson('api/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'wrong-password',
    ]);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors([
        'password' => ['The password field confirmation does not match.'],
    ]);
});
