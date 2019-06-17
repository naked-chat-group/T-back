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
<div class="cBody">
    <div class="console">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-input-inline">
                    <input type="text" name="startDate" required lay-verify="required" placeholder="订单编号" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline">
                    <input type="text" name="shopName" required lay-verify="required" placeholder="店铺名称/店铺编号" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline">
                    <select id='orderStatus'  style='width:20px;margin-top:2px' lay-filter="provid">
                        <option value='10000'>订单状态</option>
                        <option value='0'>待发货</option>
                        <option value='-2'>待支付</option>
                        <option value='-1'>已取消</option>
                        <option value='1'>配送中</option>
                        <option value='2'>已收货</option>
                        <option value='-3'>用户拒收</option>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select id='payType'  style='margin-top:2px' lay-filter="provid">
                        <option value='-1'>支付方式</option>
                        <option value='0'>货到付款</option>
                        <option value='1'>在线支付</option>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select id='deliverType'  style='margin-top:2px' lay-filter="provid">
                        <option value='-1'>配送方式</option>
                        <option value='1'>自提</option>
                        <option value='0'>送货上门</option>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select id='payFrom' lay-filter="provid">
                        <option value='0'>支付来源</option>
                        <option value='1'>支付宝</option>
                        <option value='2'>微信</option>
                    </select>
                </div>
                <button class="layui-btn" lay-submit lay-filter="formDemo">查询</button>
            </div>
        </form>

        <script>
            layui.use('form', function() {
                var form = layui.form;

                //监听提交
                form.on('submit(formDemo)', function(data) {
                    layer.msg(JSON.stringify(data.field));
                    return false;
                });
            });
        </script>
    </div>
    <table class="layui-table" id="test">

    </table>

    <!-- layUI 分页模块 -->
    <div id="pages"></div>
    <script>


        layui.use('table', function() {
            var table = layui.table;
            table.render({
                elem: '#test',
                url: 'orderPage',
                page:true,
                cols: [[
                    {field: 'orderNo',width:230, title: '订单编号'},
                    {field: 'userName',width:100, title: '收货人'},
                    {field: 'realTotalMoney',width:100, title: '实收金额'},
                    {field: 'payType',width:100, title: '支付方式',templet: function(d){
                        if(d.payType == 0){return '货到付款'}else {return '在线支付'}}},
                    {field: 'deliverType',width:100, title: '配送方式',templet: function(d){
                            if(d.deliverType == 0){return '送货上门'}else {return '自提'}}},
                    {field: 'payFrom',width:100, title: '支付来源',templet: function(d){
                            if(d.payFrom == 0){return '支付宝'}else {return '微信'}}},
                    {field: 'createTime',width:180, title: '下单时间',sort: true},
                    {field: 'orderStatus',width:100, title: '订单状态',templet: function(d){
                            switch (d.orderStatus){
                                case -3:return '用户拒收';
                                case -2:return '未支付';
                                case -1:return '取消订单';
                                case 0:return '待发货';
                                case 1:return '配送中';
                                case 2:return '用户确认收货';
                            }
                        }},
                    {field: '',title:'操作' ,width:180,templet: function(d)
                        {
                            $html ="";
                            $html +='<button class="layui-btn layui-btn-xs" onclick="updateBut('+d.orderNo+')">查看详情</button>';
                            $html +='<button class="layui-btn layui-btn-xs" onclick="updateorder('+d.orderNo+','+d.orderId+')">订单修改</button>';
                            return $html;
                        }}
                ]], id: 'testReload'
                ,
                done:function(res,curr,count){

                }
            });
        });
        var updateFrame = null;
        function updateBut(orderNo){
                layui.use('layer', function() {
                    var layer = layui.layer;
                    //iframe层-父子操作
                    updateFrame = layer.open({
                        title: "订单详情信息",
                        type: 2,
                        area: ['80%', '90%'],
                        scrollbar: false,	//默认：true,默认允许浏览器滚动，如果设定scrollbar: false，则屏蔽
                        maxmin: true,
                        content: 'OrderManagementDesc?orderNo='+orderNo
                    });
                });
        }
        var updateorderFrame = null;
        function updateorder(orderNo,orderId){
            layui.use('layer', function() {
                var layer = layui.layer;
                //iframe层-父子操作
                updateorderFrame = layer.open({
                    title: "订单修改",
                    type: 2,
                    area: ['80%', '90%'],
                    scrollbar: false,	//默认：true,默认允许浏览器滚动，如果设定scrollbar: false，则屏蔽
                    maxmin: true,
                    content: 'orderUpdate?orderNo='+orderNo+'&orderId='+orderId
                });
            });
        }
    </script>
</div>
</body>

</html>