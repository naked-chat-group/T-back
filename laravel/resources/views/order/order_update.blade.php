<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <!-- Google Chrome Frame也可以让IE用上Chrome的引擎: -->
    <meta name="renderer" content="webkit">
    <!--国产浏览器高速模式-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="穷在闹市" />
    <!-- 作者 -->
    <meta name="revised" content="穷在闹市.v3, 2019/05/01" />
    <!-- 定义页面的最新版本 -->
    <meta name="description" content="网站简介" />
    <!-- 网站简介 -->
    <meta name="keywords" content="搜索关键字，以半角英文逗号隔开" />
    <title>穷在闹市出品</title>

    <!-- 公共样式 开始 -->
    <link rel="stylesheet" type="text/css" href="../../css/base.css">
    <link rel="stylesheet" type="text/css" href="../../css/iconfont.css">
    <script type="text/javascript" src="../../framework/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../layui/css/layui.css">
    <script type="text/javascript" src="../../layui/layui.js"></script>
    <!-- 滚动条插件 -->
    <link rel="stylesheet" type="text/css" href="../../css/jquery.mCustomScrollbar.css">
    <script src="../../framework/jquery-ui-1.10.4.min.js"></script>
    <script src="../../framework/jquery.mousewheel.min.js"></script>
    <script src="../../framework/jquery.mCustomScrollbar.min.js"></script>
    <script src="../../framework/cframe.js"></script><!-- 仅供所有子页面使用 -->
    <!-- 公共样式 结束 -->

</head>

<body>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>订单详情</legend>
</fieldset>
<div style="padding: 20px; background-color: #F2F2F2;">
    <div class="layui-row layui-col-space15">


        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">收货人信息</div>
                <div class="layui-card-body">

                    下单会员： <input type="text" lay-verify="title" autocomplete="off" class="layui-input" value="{{ $order->userid }}"><br>
                    收货人： <input type="text" lay-verify="title" autocomplete="off" class="layui-input" value="{{ $order->userName }}"><br>
                    收货地址： <input type="text" lay-verify="title" autocomplete="off" class="layui-input" value="{{ $order->userAddress }}"><br>
                    联系方式： <input type="text" lay-verify="title" autocomplete="off" class="layui-input" value="{{ $order->userPhone }}"><br>
                </div>
            </div>
        </div>


    </div>


</div>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>商品清单</legend>
</fieldset>
<div class="layui-card-body">
    商品名称： {{ $ordergood['goodsName'] }}<br>
    单价： {{ $ordergood['goodsNum'] }}<br>
    数量：<input type="text" lay-verify="title" autocomplete="off" class="layui-input" value="{{ $ordergood['goodsNum'] }}"><br>
    总价：{{ $order->realTotalMoney }}<br>
</div>

<div style="padding: 20px; background-color: #F2F2F2;">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-body">
                    商品总金额：¥ {{ $order->goodMoney }}<br>
                    运费：¥ {{ $order->deliverMoney }}<br>
                    应付总金额：¥ {{ $order->totalMoney }}<br>
                </div>
            </div>
        </div>
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-body">
                    积分抵扣金额：¥ <br>
                    实付总金额：¥ 0.00<br>
                    可获得积分：¥<br>

                </div>
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">

            <button class="layui-btn" lay-submit lay-filter="submitBut" >立即修改</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</body>

</html>