<?php

use App\User;
use App\Category;
use App\Tag;
use Faker\Generator;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Generator $faker) {
 

    return [
        'name' 		=> $faker->name,
        //'email' 	=> $faker->Email,
        'email' 	=> str_random(10).'@gmail.com',

        'password' 	=> bcrypt('123456'),
        
    ];
});

$factory->define(Category::class, function(Generator $faker){
	return [
		'name' => $faker->name,
	];
});


$factory->define(Tag::class, function(Generator $faker){
	return [
		'name' => $faker->cityPrefix,
	];
});


