<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(\App\Models\Company\Report::class, function (Faker $faker) {
    $randomDate = function() {
        return Carbon::now()
            ->subYear(mt_rand(0,10))
            ->subMonths(mt_rand(0,12))
            ->subDays(mt_rand(0,26));
    };

    return [
        'bool_1' => $faker->boolean(),
        'bool_2' => $faker->boolean(),
        'bool_3' => $faker->boolean(),
        'bool_4' => $faker->boolean(),
        'bool_5' => $faker->boolean(),
        'bool_6' => $faker->boolean(),
        'bool_7' => $faker->boolean(),
        'bool_8' => $faker->boolean(),
        'bool_9' => $faker->boolean(),
        'bool_10' => $faker->boolean(),
        'string_1' => $faker->text(),
        'string_2' => $faker->text(),
        'string_3' => $faker->text(),
        'string_4' => $faker->text(),
        'string_5' => $faker->text(),
        'string_6' => $faker->text(),
        'string_7' => $faker->text(),
        'string_8' => $faker->text(),
        'string_9' => $faker->text(),
        'string_10' => $faker->text(),
        'float_1' => $faker->randomFloat(6, 0, 99),
        'float_2' => $faker->randomFloat(6, 0, 99),
        'float_3' => $faker->randomFloat(6, 0, 99),
        'float_4' => $faker->randomFloat(6, 0, 99),
        'float_5' => $faker->randomFloat(6, 0, 99),
        'float_6' => $faker->randomFloat(6, 0, 99),
        'float_7' => $faker->randomFloat(6, 0, 99),
        'float_8' => $faker->randomFloat(6, 0, 99),
        'float_9' => $faker->randomFloat(6, 0, 99),
        'float_10' => $faker->randomFloat(6, 0, 99),
        'timestamp_1' => $randomDate(),
        'timestamp_2' => $randomDate(),
        'timestamp_3' => $randomDate(),
        'timestamp_4' => $randomDate(),
        'timestamp_5' => $randomDate(),
        'timestamp_6' => $randomDate(),
        'timestamp_7' => $randomDate(),
        'timestamp_8' => $randomDate(),
        'timestamp_9' => $randomDate(),
        'timestamp_10' => $randomDate(),
        'integer_1' => mt_rand(1,1000000),
        'integer_2' => mt_rand(1,1000000),
        'integer_3' => mt_rand(1,1000000),
        'integer_4' => mt_rand(1,1000000),
        'integer_5' => mt_rand(1,1000000),
        'integer_6' => mt_rand(1,1000000),
        'integer_7' => mt_rand(1,1000000),
        'integer_8' => mt_rand(1,1000000),
        'integer_9' => mt_rand(1,1000000),
        'integer_10' => mt_rand(1,1000000),
    ];
});
