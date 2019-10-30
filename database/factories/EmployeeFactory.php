<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
      'name' => $faker -> name('male'|'female'),
      'email' => $faker -> email,
      'password' => md5('123456'),
    ];
});
