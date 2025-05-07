<?php

declare(strict_types=1);

use App\Models\User;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

test('users can login', function () {
    $user = User::factory()->create()->refresh();

    $response = $this->postJson('api/login', [
        'email' => $user->email,
        'password' => 'password', // This is a default password for the user
    ]);

    $response->assertStatus(200);
    $response->assertJson([
        'message' => 'Login successful.',
        'access_token' => $response->json('access_token'),
    ]);
});

test('users can not login with wrong credentials', function () {
    $user = User::factory()->create();

    $response = $this->postJson('api/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors([
        'email' => ['The provided credentials are incorrect.'],
    ]);
});
