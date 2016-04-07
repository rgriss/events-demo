<?php

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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name'=>$faker->firstName,
        'last_name'=>$faker->lastName,
        'phone'=>$faker->phoneNumber,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});



$factory->define(App\Event::class, function (Faker\Generator $faker) {
    $eventTypes = ['Orientation Meeting', 'Trade Show', 'Concert', 'Golf Outing', 'Conference','Opening Ceremony','Product Launch', 'Party','Trade Fair','Retreat','Wedding','Reception','Anniversary Party','Seminar'];
    return [
        'title' => $faker->domainWord.' '.$eventTypes[array_rand($eventTypes)],
        'date' => $faker->dateTimeBetween('-2 years','+2 years')->format('Y-m-d'),
    ];
});
