<?php

declare(strict_types=1);

use App\Models\User;
use Laravel\Sanctum\Sanctum;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

test('users can logout', function () {
    Sanctum::actingAs(User::factory()->create());

    $response = $this->postJson('api/logout');

    $response->assertStatus(200);
    $response->assertJson([
        'message' => 'Logout successful.',
    ]);
});
