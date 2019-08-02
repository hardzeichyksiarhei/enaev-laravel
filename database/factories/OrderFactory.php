<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
  $date = $faker->dateTimeInInterval($startDate = '-1 years', $interval = '+5 days', $timezone = null);
  return [
      'name' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'contact' => $faker->address,
      'caption' => $faker->sentence($nbWords = 4, $variableNbWords = true),
      'message' => $faker->text($maxNbChars = 200),
      'created_at' => $date,
      'updated_at' => $date
  ];
});
