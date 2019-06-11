<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\model\shop_good;
use Faker\Generator as Faker;

$factory->define(shop_good::class, function (Faker $faker) {
    return [
        'goodsSn' => $faker->creditCardNumber,
        'productNo' => $faker->randomNumber,
        'goodsName' => $faker->name,
        'goodsImg' => $faker->imageUrl,
        'marketPrice' => $faker->randomFloat(2, 100, 10000),
        'shopPrice' => $faker->randomFloat(2,100,10000),
        'warnStock' => $faker->numberBetween(1000, 9000),
        'goodsStock' => $faker->numberBetween(10000,90000),
        'goodsUnit' => $faker->name,
        'goodsTips' => $faker->text,
        'isSale' => $faker->numberBetween(0, 1),
        'isBes' => $faker->numberBetween(0, 1),
        'isHot' => $faker->numberBetween(0, 1),
        'isNew' => $faker->numberBetween(0, 1),
        'isRecom' => $faker->numberBetween(0, 1),
        'goodsCatIdPath' => $faker->fileExtension,
        'goodsCatId' => $faker->numberBetween(0,9),
        'goodsCatId' => $faker->numberBetween(0,9),
        'shopCatId1' => $faker->numberBetween(0,9),
        'shopCatId2' => $faker->numberBetween(0,9),
        'brandId' => $faker->numberBetween(0,100),
        'goodsDesc' => $faker->text,
        'goodsStatus' => $faker->numberBetween(-1,1),
        'saleNum' => $faker->numberBetween(100,1000),
        'saleTime' => $faker->dateTimeThisCentury('1950-01-01', 'PRC'),
        'appraiseNum' => $faker->numberBetween(1000,2000),
        'isSpec' => $faker->numberBetween(0,1),
        'gallery' => $faker->text,
        'goodsSeoKeywords' => $faker->name,
        'illegalRemarks' => $faker->text,
        'dataFlag' => $faker->randomElement([-1,1])
        //
    ];
});
