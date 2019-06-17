<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopGoodsAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_goods_attributes', function (Blueprint $table) {
            $table->increments('attrId')->comment('商品属性自增ID');
            $table->integer('goodsCatId')->nullable(false)->default(0)->comment('最后一级商品分类ID');
            $table->string('goodsCatPath',100)->nullable(false)->comment('商品分类路径');
            $table->string('attrName',100)->nullable(false)->comment('属性名称');
            $table->text('attrVal')->comment('属性值');
            $table->integer('attrSort')->nullable(false)->default(0)->comment('排序号');
            $table->tinyInteger('isShow')->default(0)->comment('是否显示:1:显示 0:不显示');
            $table->tinyInteger('dataFlag')->nullable(false)->default(1)->comment('有效状态:1:有效 -1:无效');
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
        Schema::dropIfExists('shop_goods_attributes');
    }
}
