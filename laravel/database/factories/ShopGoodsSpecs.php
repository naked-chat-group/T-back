<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\model\shop_goods_specs;
use Faker\Generator as Faker;

$factory->define(shop_goods_specs::class, function (Faker $faker) {
    return [
        'goodsId' => $faker->numberBetween(0,50),
        'productNo' => $faker->creditCardNumber,
        'specIds' => $faker->name,
        'marketPrice' => $faker->randomFloat(2, 100, 10000),
        'specPrice' => $faker->randomFloat(2,100,1000),
        'specStock' => $faker->numberBetween(100,1000),
        'warnStock' => $faker->numberBetween(1000,10000),
        'saleNum' => $faker->numberBetween(100,500),
        'isDefault' => $faker->numberBetween(0,1),
        'dataFlag' => $faker->randomElement([-1,1])
    ];
});
