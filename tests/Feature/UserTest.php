<?php

use App\Models\User;
use App\Models\Promotion;
use App\Models\Worker;


it('can create a user', function () {
    User::factory()->create();

    $this->assertTrue(User::exists());
});

it('can retrieve user promotions', function () {
    $user = User::factory()->create();
    $promotion = Promotion::factory()->create([
        'name' => 'Test Promotion',
        'user_id' => $user->id,
    ]);

    $response = $this->get('/user/'.$user->id.'/promotions');

    $response->assertStatus(200);
    $response->assertJsonFragment(['name' => 'Test Promotion']);
});

it('can retrieve user workers', function () {
    $user = User::factory()->has(Worker::factory()->count(3))->create();

    $this->assertEquals(3, $user->workers->count());
});
