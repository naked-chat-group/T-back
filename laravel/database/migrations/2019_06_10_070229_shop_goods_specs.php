<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopGoodsSpecs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_goods_specs', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('商品规格自增id');
            $table->integer('goodsId')->nullable(false)->default(0)->comment('商品ID');
            $table->string('productNo',20)->nullable(false)->comment('商品货号');
            $table->string('specIds')->nullable(false)->comment('规格ID格式 例如：specId:specId:specId:specId:specId');
            $table->decimal('marketPrice',11,2)->nullable(false)->default(0)->comment('市场价');
            $table->decimal('specPrice',11,2)->nullable(false)->default(0)->comment('商品价');
            $table->integer('specStock')->nullable(false)->default(0)->comment('库存');
            $table->integer('warnStock')->nullable(false)->default(0)->comment('库存预警值');
            $table->integer('saleNum')->nullable(false)->default(0)->comment('销量');
            $table->tinyInteger('isDefault')->nullable(false)->default(0)->comment('默认规格:1：默认规格 0：非默认规格');
            $table->tinyInteger('dataFlag')->nullable(false)->default(1)->comment('有效状态：1有效 -1无效');
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
        Schema::dropIfExists('shop_goods_specs');
    }
}
