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
    <form id="addForm" class="layui-form" action="javascript:void(0)">
        <div class="layui-form-item">
            <label class="layui-form-label">管理员名称</label>
            <div class="layui-input-inline shortInput">
                <input type="text" name="admin_name" required lay-verify="required|username" autocomplete="off" class="layui-input">
            </div>
            <i class="iconfont icon-huaban bt"></i>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">管理员密码</label>
            <div class="layui-input-inline shortInput">
                <input type="password" name="password" required lay-verify="required|password" autocomplete="off" class="layui-input">
            </div>
            <i class="iconfont icon-huaban bt"></i>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码</label>
            <div class="layui-input-inline shortInput">
                <input type="password" name="confirmPassword" required lay-verify="required|confirmPassword"  autocomplete="off" class="layui-input">
            </div>
            <i class="iconfont icon-huaban bt"></i>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-inline shortInput">
                <input type="text" name="email" required lay-verify="required|email" placeholder="管理员邮箱" autocomplete="off" class="layui-input">
            </div>
            <i class="iconfont icon-huaban bt"></i>
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
    <script>
        //默认城市为：宁夏 - 银川
        // var defaults = {
        //     s1: 'provid',
        //     s2: 'cityid',
        //     s3: 'areaid',
        //     v1: 510000,
        //     v2: 510100,
        //     v3: null
        // };
        layui.use('form', function(){
            var form = layui.form;

            //各种基于事件的操作，下面会有进一步介绍
            form.verify({
                username: function(value, item){ //value：表单的值、item：表单的DOM对象
                    if (!  /^[a-zA-Z]{4,16}$/.test(value)) {
                        return '用户名称为4-16位字母组成'
                    }
                },
                password: function(value, item) {
                    if (! /(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[$@!%*#?&])[A-Za-z\d$@!%*#?&]{6,}$/.test(value)) {
                        return '密码最少6位,且至少一位大写字母,一个数字,一个特殊字符,一个小写字母';
                    }
                },
                confirmPassword: function(value, item) {
                    var pwd = $("input[name='password']").val();
                    if (pwd != value) {
                        return '请确认密码';
                    }
                },
                role: function (value, item) {
                    if (!value) {
                        return '请选择角色';
                    }
                }
            });
            form.on('submit(submitBut)', function(data){
                var data = data.field; //当前容器的全部表单字段，名值对形式：{name: value}
                var index = layer.load();
                ajax('/AdminStore', 'post', data, function(e) {
                    if (200 != e.code) {
                        layer.close(index);
                        layer.msg(e.msg, {icon: 5,anim: 6,time:2000});
                    }
                    layer.close(index);
                    layer.msg(e.msg, {icon: 6, time: 1000}, function() {
                        location.href = '/AdminManagement';
                    })
                });

                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });
            function ajax(url, method, data, callback) {
                $.ajax({
                    url:url,
                    method:method,
                    data:data,
                    dataType: 'json',
                    headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                    success: callback
                })
            }
        });

    </script>

</div>
</body>