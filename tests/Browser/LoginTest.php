<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

it('log in a user', function () {
    $user = User::factory()->create(['password' => 'Password123!']);
    visit('/login')
        ->fill('email', $user->email)
        ->fill('password', 'Password123!')
        ->click('@login-button')
        ->assertPathIs('/');

    $this->assertAuthenticated();
});


it('logout a user', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    visit('/')->click('Log Out');

    $this->assertGuest();
});
