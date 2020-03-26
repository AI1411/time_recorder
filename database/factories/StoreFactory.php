<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Store;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Store::class, function (Faker $faker) {
    $store = $faker->word;
    return [
        'name' => Str::limit($store, 5),
        'pref_id' => random_int(1, 47),
    ];
});
