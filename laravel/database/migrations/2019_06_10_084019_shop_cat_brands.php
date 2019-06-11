<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopCatBrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_cat_brands', function (Blueprint $table) {
            $table->increments('id')->comment('自增ID');
            $table->integer('cat_Id')->comment('商品分类自增ID');
            $table->integer('brand_Id')->comment('品牌自增ID');
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_cat_brands');
    }
}
