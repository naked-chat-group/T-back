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
    <style>
        .layui-form{
            margin-right: 30%;
        }
    </style>

</head>

<body>
<div class="cBody">
    <form id="addForm" class="layui-form" action="WarehouseManagementInsert" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">仓库名称</label>
            <div class="layui-input-inline shortInput">
                <input type="text" name="name" required lay-verify="required|ZHCheck" placeholder="请输入仓库名称" autocomplete="off" class="layui-input">
            </div>
            <i class="iconfont icon-huaban bt"></i>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">仓库编号</label>
            <div class="layui-input-inline shortInput">
                <input type="text" name="number" required lay-verify="required" placeholder="请输入仓库编号" autocomplete="off" class="layui-input">
            </div>
            <i class="iconfont icon-huaban bt"></i>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">所在地区</label>
            <div class="layui-input-inline">
                <select name="provid" required lay-verify="required" id="provid" lay-filter="provid">
                    <option value="">请选择省/直辖市</option>
                    @foreach($area as $v)
                        <option value="{{$v['area_name']}}">{{$v['area_name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="layui-input-inline">
                <select name="city" id="city" lay-filter="cityid">
                    <option value="">请选择市</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">服务地区</label>
            <div class="layui-input-inline">
                <select name="serve_area" id="serve_city" lay-filter="serve_city">
                    <option value="">请选择市</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">负责人</label>
            <div class="layui-input-inline shortInput">
                <input type="text" name="principal" required lay-verify="required|ZHCheck" placeholder="负责人" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否启用</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="启用" checked>
                <input type="radio" name="status" value="2" title="未启用">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="submitBut">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
    <!-- 三级省市 插件 -->
    {{--<script src="../../framework/area.js"></script>--}}
    {{--<script src="../../framework/province.js"></script>--}}
</div>
</body>
</html>
<script>
    layui.use(['layer', 'form'], function () {
        var layer = layui.layer,
            form = layui.form;

        form.on('select(provid)', function (data) {
            var area = data.value;
            $.ajax({
                type:'get',
                data:{provid:area},
                dataType:'json',
                url:"WarehouseManagementCity",
                success:function (v) {
                    var option = '';
                    for(var i=0;i<v.length;i++){  //循环获取返回值，并组装成html代码
                        option +='<option value="'+v[i]['area_name']+'">'+v[i]['area_name']+'</option>';
                    }
                    $("#city").html(option);
                    $("#serve_city").html(option);
                    form.render('select');
                }

            })
        });

    })
</script>