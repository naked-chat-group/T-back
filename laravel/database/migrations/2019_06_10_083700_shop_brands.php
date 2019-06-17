<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShowBrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_brands', function (Blueprint $table) {
            $table->increments('brandId')->comment('品牌自增ID');
            $table->string('brandName',100)->nullable(false)->comment('品牌名称');
            $table->string('brandImg',150)->nullable(false)->comment('品牌商标');
            $table->text('brandDesc')->comment('品牌介绍');
            $table->tinyInteger('dataFlag')->nullable(false)->comment('删除标志:-1:删除 1:有效');
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
        Schema::dropIfExists('show_brands');
    }
}
