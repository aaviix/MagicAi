<?php

declare(strict_types=1);

test('example test', function () {
    $user = \App\Models\User::factory()->create();

    expect($user)->toBe($user);
});
