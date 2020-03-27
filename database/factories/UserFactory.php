<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Pref;
use App\Models\Store;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $pref = random_int(1, 47);
    $store_count = count(Store::all());
    $policy = random_int(1, 3);
    return [
        'first_name' => $first_name = $faker->firstName,
        'last_name' => $last_name = $faker->lastName,
        'name' => $last_name . $first_name,
        'email' => $faker->unique()->safeEmail,
        'age' => random_int(18, 60),
        'pref_id' => $pref,
        'region_id' => Pref::find($pref)->region_id,
        'role_id' => $policy,
        'store_id' => random_int(1, $store_count),
        'employment_status_id' => $policy,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
