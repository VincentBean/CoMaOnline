<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Customer;
use App\User;
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
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'disabled' => $faker->numberBetween(0, 1),
    ];
});

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'surname' => $faker->lastName,
        'gender' => 'male',
        'phone' => $faker->phoneNumber,
        'street_name' => $faker->streetName,
        'house_number' => $faker->buildingNumber,
        'zipcode' => $faker->postcode,
        'city' => $faker->city,
        'province' => $faker->country,
        // Any other Fields in your Comments Model
    ];
});
