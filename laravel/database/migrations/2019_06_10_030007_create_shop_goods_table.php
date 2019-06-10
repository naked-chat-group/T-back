<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_good', function (Blueprint $table) {
            $table->increments('goodsId')->comment('商品ID');
            $table->string('goodsSn',20)->nullable(false)->comment('商品编号');
            $table->string('productNo',20)->nullable(false)->comment('商品货号');
            $table->string('goodsName',50)->nullable(false)->comment('商品名称');
            $table->string('goodsImg',150)->nullable(false)->comment('商品图片');
            $table->decimal('markPrice',11,2)->nullable(false)->default(0.00)->comment('市场价');
            $table->decimal('shopPrice',11,2)->nullable(false)->default(0.00)->comment('门店价');
            $table->integer('warnStock')->nullable(false)->default(0)->comment('预警库存');
            $table->integer('goodsStock')->nullable(false)->default(0)->comment('商品库存');
            $table->string('goodsUnit',10)->nullable(false)->comment('单位');
            $table->text('goodsTips')->comment('促销信息');
            $table->tinyInteger('isSale')->nullable(false)->default(1)->comment('是否上架：0:不上架 1:上架');
            $table->tinyInteger('isBes')->nullable(false)->default(0)->comment('是否精品：0:否 1:是');
            $table->tinyInteger('isHot')->nullable(false)->default(0)->comment('是否热销产品：0:否 1:是');
            $table->tinyInteger('isNew')->nullable(false)->default(0)->comment('是否新品：0:否 1:是');
            $table->tinyInteger('isRecom')->nullable(false)->default(0)->comment('是否推荐：0:否 1:是');
            $table->string('goodsCatIdPath')->comment('商品分类ID路径');
            $table->integer('goodsCatId')->nullable(false)->comment('最后一级商品分类ID');
            $table->integer('shopCatId1')->nullable(false)->comment('门店商品分类第一级ID');
            $table->integer('shopCatId2')->nullable(false)->comment('门店商品第二级分类ID');
            $table->integer('brandId')->nullable(false)->default(0)->comment('品牌Id');
            $table->text('goodsDesc')->nullable(false)->comment('商品描述');
            $table->tinyInteger('goodsStatus')->nullable(false)->default(0)->comment('商品状态:-1:违规 0:未审核 1:已审核');
            $table->integer('saleNum')->nullable(false)->default(0)->comment('总销售量');
            $table->dateTime('saleTime')->nullable(false)->comment('上架时间');
            $table->integer('visitNum')->nullable(false)->default(0)->comment('访问数');
            $table->integer('appraiseNum')->nullable(false)->default(0)->comment('评价数');
            $table->tinyInteger('isSpec')->nullable(false)->default(0)->comment('是否有规格：0:没有 1:有');
            $table->text('gallery')->comment('商品相册');
            $table->string('goodsSeoKeywords',200)->comment('商品SEO关键字');
            $table->string('illegalRemarks')->comment('状态说明:一般用于说明拒绝原因');
            $table->tinyInteger('dataFlag')->nullable(false)->default(0)->comment('删除标志：-1:删除 1:有效');
            $table->index('goodsCatIdPath');
            $table->index(['goodsStatus','isSale','dataFlag']);
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
        Schema::dropIfExists('shop_good');
    }
}
