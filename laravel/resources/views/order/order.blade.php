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

    <table class="layui-table">
        <thead>
        <tr>
            <th>订单编号</th>
            <th>收货人</th>
            <th>实收金额</th>
            <th>支付方式</th>
            <th>配送方式</th>
            <th>订单来源</th>
            <th>下单时间</th>
            <th>订单状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <!-- layUI 分页模块 -->
    <div id="pages"></div>
    <script>


        layui.use(['laypage', 'layer'], function() {
            var laypage = layui.laypage,
                layer = layui.layer;

            //总页数大于页码总数
            laypage.render({
                elem: 'pages'
                ,count:{{ $count }}
                ,layout: ['count', 'prev', 'page', 'next', 'limit', 'skip']
                ,jump: function(obj){
                    var page = obj.curr;
                    var limit = obj.limit;

                    ajaxGetData(page,limit);
                }
            });
        });
        function ajaxGetData(page,limit) {
            $.ajax({
                url:'orderPage',
                type:'get',
                data:{
                    page:page,
                    limit:limit
                },
                success:function(msg)
                {
                    $('tbody').empty();
                    $('tbody').html(msg);
                }
            })
        }
    </script>
</div>
</body>

</html>