<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'address'=>$faker->address,
        'email'=>$faker->unique()->safeEmail,
        'created_at'=>new DateTime,
        'update_at'=>new DataTime,
    ];
});
