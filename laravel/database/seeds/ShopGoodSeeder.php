<?php

use Illuminate\Database\Seeder;

class ShopGoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\model\shop_good::class, 50)->create();
    }
}
