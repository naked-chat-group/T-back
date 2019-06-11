<?php

use Illuminate\Database\Seeder;

class ShopGoodsSpecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\model\shop_goods_specs::class, 50)->create();
    }
}
