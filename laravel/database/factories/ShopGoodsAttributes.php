<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\model\shop_goods_attributes;
use Faker\Generator as Faker;

$factory->define(shop_goods_attributes::class, function (Faker $faker) {
    return [
        'goodsCatId' => $faker->numberBetween(0,50),
        'goodsCatPath' => $faker->mimeType,
        'attrName' => $faker->name,
        'attrType' => $faker->numberBetween(0,2),
        'attrVal' => $faker->text,
        'attrSort' => $faker->numberBetween(100,1000),
        'isShow' => $faker->numberBetween(0,1),
        'dataFlag' => $faker->randomElement([-1,1])
    ];
});
