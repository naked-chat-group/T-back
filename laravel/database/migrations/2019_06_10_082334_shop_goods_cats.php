<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopGoodsCats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_goods_cats', function (Blueprint $table) {
            $table->increments('catId')->comment('商品分类自增ID');
            $table->integer('parentId')->nullable(false)->comment('父id');
            $table->string('catName',20)->comment('分类名称');
            $table->tinyInteger('isShow')->nullable(false)->default(1)->comment('是否显示:0:隐藏 1:显示');
            $table->tinyInteger('isFloor')->nullable(false)->default(1)->comment('是否显示楼层；0:不显示 1:显示');
            $table->tinyInteger('dataFlag')->nullable(false)->default(1)->comment('商品分类自增ID');
            $table->integer('catSort')->nullable(false)->default(0)->comment('排序号');
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
        Schema::dropIfExists('shop_goods_cats');
    }
}
