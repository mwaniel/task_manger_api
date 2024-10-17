<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Task;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence,
        'description' => $faker->paragraph,
        'status' => 'pending',
        'due_date' => $faker->dateTimeBetween('now', '+1 year'),
        'created_at' =>carbon::now(),
        'updated_at' => carbon::now(),
    ];
});
