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
    <div id="test4" class="demo-transfer"></div>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
        <legend>显示搜索框</legend>
    </fieldset>

    <script>

        layui.use(['transfer', 'layer', 'util'], function(){
            var $ = layui.$
                ,transfer = layui.transfer
                ,layer = layui.layer
                ,util = layui.util;

            //模拟数据
            var data1 = [
                {"value": "1", "title": "李白"}
                ,{"value": "2", "title": "杜甫"}
                ,{"value": "3", "title": "苏轼"}
                ,{"value": "4", "title": "李清照"}
                ,{"value": "5", "title": "鲁迅", "disabled": true}
                ,{"value": "6", "title": "巴金"}
                ,{"value": "7", "title": "冰心"}
                ,{"value": "8", "title": "矛盾"}
                ,{"value": "9", "title": "贤心"}
            ]

                ,data2 = [
                {"value": "1", "title": "瓦罐汤"}
                ,{"value": "2", "title": "油酥饼"}
                ,{"value": "3", "title": "炸酱面"}
                ,{"value": "4", "title": "串串香", "disabled": true}
                ,{"value": "5", "title": "豆腐脑"}
                ,{"value": "6", "title": "驴打滚"}
                ,{"value": "7", "title": "北京烤鸭"}
                ,{"value": "8", "title": "烤冷面"}
                ,{"value": "9", "title": "毛血旺", "disabled": true}
                ,{"value": "10", "title": "肉夹馍"}
                ,{"value": "11", "title": "臊子面"}
                ,{"value": "12", "title": "凉皮"}
                ,{"value": "13", "title": "羊肉泡馍"}
                ,{"value": "14", "title": "冰糖葫芦", "disabled": true}
                ,{"value": "15", "title": "狼牙土豆"}
            ];
            //显示搜索框
            transfer.render({
                elem: '#test4'
                ,data: data1
                ,title: ['文本墨客', '获奖文人']
                ,showSearch: true
            })
        });

    </script>
</div>
</body>

</html>