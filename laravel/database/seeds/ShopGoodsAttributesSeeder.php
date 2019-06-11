<?php

use Illuminate\Database\Seeder;

class ShopGoodsAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\model\shop_goods_attributes::class, 50)->create();
    }
}
