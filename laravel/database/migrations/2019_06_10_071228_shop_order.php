<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_order', function (Blueprint $table) {
            $table->increments('orderid')->comment('订单表自增ID');
            $table->string('orderNo')->nullable(false)->comment('订单号');
            $table->integer('userid')->nullable(false)->comment('用户ID');
            $table->tinyInteger('orderStatus')->nullable(false)->default(-2)->comment('订单状态：-3:用户拒收 -2:未付款的订单 -1：用户取消 0:待发货 1:配送中 2:用户确认收货');
            $table->decimal('goodMoney',11,2)->nullable(false)->comment('商品总金额');
            $table->tinyInteger('deliverType')->nullable(false)->default(0)->comment('收货方式：0:送货上门 1:自提');
            $table->decimal('deliverMoney')->nullable(false)->default(0)->comment('运费：运费规则按照每家店的规则算');
            $table->decimal('totalMoney',11,2)->nullable(false)->comment('订单总金额 包括运费');
            $table->decimal('realTotalMoney',11,2)->nullable(false)->default(0)->comment('实际订单总金额 进行各种折扣之后的金额');
            $table->tinyInteger('payType')->nullable(false)->default(0)->comment('支付方式:0:货到付款 1:在线支付');
            $table->integer('payFrom')->nullable(false)->default(0)->comment('支付来源：1:支付宝，2：微信');
            $table->tinyInteger('isPay')->nullable(false)->default(0)->comment('是否支付:0:未支付 1:已支付');
            $table->tinyInteger('userName')->nullable(false)->comment('收货人名称');
            $table->tinyInteger('userAddress')->nullable(false)->comment('收货人地址');
            $table->string('userPhone',11)->nullable(false)->comment('收货人手机');
            $table->integer('orderScore')->nullable(false)->default(0)->comment('所得积分');
            $table->tinyInteger('isInvoice')->nullable(false)->default(0)->comment('是否需要:发票:1:需要 0:不需要');
            $table->tinyInteger('invoiceClient')->comment('发票抬头:1:需要 0:不需要');
            $table->string('orderRemarks')->comment('订单备注');
            $table->decimal('needPay',11,2)->default(0)->comment('需缴费用');
            $table->tinyInteger('isRefund')->nullable(false)->default(0)->comment('是否退款:0:否 1：是');
            $table->tinyInteger('isAppraise')->nullable(false)->comment('是否点评:0:未点评 1:已点评');
            $table->integer('cancelReason')->comment('取消原因ID');
            $table->integer('rejectReason')->comment('拒收原因ID');
            $table->string('rejectOtherReason')->comment('拒收原因');
            $table->tinyInteger('isClosed')->nullable(false)->default(0)->comment('是否订单已完结:0：未完结 1:已完结');
            $table->string('orderunique',50)->nullable(false)->comment('订单流水号');
            $table->integer('settlementId')->comment('是否结算，大于0的话则是结算ID');
            $table->dateTime('receiveTime')->comment('收货时间');
            $table->dateTime('deliveryTime')->comment('发货时间');
            $table->integer('expressId')->comment('快递公司ID');
            $table->string('expressNo',20)->comment('快递号');
            $table->string('tradeNo',100)->comment('在线支付交易流水');
            $table->tinyInteger('dataFlag')->nullable(false)->default(1)->comment('订单有效标志:-1：删除 1:有效');
            $table->dateTime('createTime')->comment('下单时间');
            $table->integer('areaId')->nullable(false)->comment('最后一级区域Id');
            $table->string('areaIdPath')->comment('区域Id路径:省级id_市级id_县级Id_ 例如:110000_110100_110101_');
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
        Schema::dropIfExists('shop_order');
    }
}
