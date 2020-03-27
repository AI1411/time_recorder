<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models;
use App\Models\Salary;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Salary::class, function (Faker $faker) {
    $users = User::all();
    return [
        'user_id' => random_int(1, count($users)),
        'salary' => random_int(100, 500) . 0 . 0 . 0,
    ];
});
