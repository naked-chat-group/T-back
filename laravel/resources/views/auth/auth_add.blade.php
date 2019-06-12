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
            <label class="layui-form-label">权限名称</label>
            <div class="layui-input-inline shortInput">
                <input type="text" name="admin_name" required lay-verify="required|username" autocomplete="off" class="layui-input">
            </div>
            <i class="iconfont icon-huaban bt"></i>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">权限集合</label>
            <div class="layui-input-block">
                <table class="layui-table" style="width: auto;">
                    <tr>
                        <th>权限码</th>
                        <th>操作</th>
                    </tr>
                    <tbody id="auth-data">
                    <tr>
                        <td>
                            <input type="text" value="" class="layui-input">
                        </td>
                        <td>
                            <button type="button" class="layui-btn layui-btn-sm">
                                <i class="layui-icon">&#xe640;</i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="layui-input-inline" style="width: 500px">
                    <div class="layui-form-mid layui-word-aux">* 此码是由 [ 控制器名称 ] @ [ 动作名称 ] 组成，例如 管理员列表的权限码：system@admin_list</div>
                </div>
            </div>

        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">添加权限码</label>
            <div class="layui-input-inline">
                <select lay-filter="controller" name="">
                    <option value="">请选择控制器</option>
                    @foreach($planList as $val)
                        <option value="{{ $val }}">{{ $val }}</option>
                    @endforeach
                </select>
            </div>
            <div class="layui-form-mid layui-word-aux">@</div>
            <div class="layui-input-inline">
                <select lay-filter="action" id="action">
                    <option value="">请选择方法</option>
                </select>
            </div>
            <button type="button" class="layui-btn" id="addAuthCode">
                <i class="layui-icon">&#xe608;</i> 添加
            </button>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">选择类型</label>
            <div class="layui-input-block">
                <input type="radio" name="sex" value="nan" title="页面权限" checked>
                <input type="radio" name="sex" value="nv" title="操作权限">
            </div>
            <div class="layui-input-inline" style="width: 300px">
                <i class="iconfont icon-huaban bt"></i>
                <div class="layui-form-mid layui-word-aux">页面权限为菜单，操作权限为动作</div>
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
        $('#addAuthCode').click(function(){

        });
        layui.use('form', function() {
            var form = layui.form;


            form.on('select(controller)', function (obj) {
                ajax('/getAction', 'get', {controller:obj.value}, function(e) {
                    var option = '<option value="">请选择方法</option>';
                    $.each(e.data, function(i,v) {
                        option += '<option value="'+v+'">'+v+'</option>';
                    });
                    $("#action").html(option);
                    form.render('select');
                })
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

</html>