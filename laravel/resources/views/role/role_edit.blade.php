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
        <input type="hidden" value="{{ $role->id }}" name="id">
        <div class="layui-form-item">
            <div class="layui-input-inline shortInput">
                <input type="text" name="name" value="{{ $role->name }}" required lay-verify="required" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline" style="width: 500px">
                <i class="iconfont icon-huaban bt"></i>
                <div class="layui-form-mid layui-word-aux">角色名称</div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-card">
                <div class="layui-card-header">菜单分配</div>
                <div class="layui-card-body">
                    @foreach($menu as $key => $val)
                        <div class="layui-form-item">
                            <div class="layui-input-inline">
                                <input type="checkbox"  @if(in_array($val['right']['id'], $RoleMenu)) checked @endif value="{{ $val['right']['id'] }}" title="{{ substr($val['right']['name'], stripos($val['right']['name'], ']')+1) }}" lay-skin="primary" class="menu">
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    @foreach($val['children'] as $val2)
                                        <input type="checkbox" @if(in_array($val2['right']['id'], $RoleMenu)) checked @endif value="{{ $val2['right']['id'] }}" title="{{ substr($val2['right']['name'], stripos($val2['right']['name'], ']')+1) }}" lay-skin="primary" class="menu">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr class="layui-bg-black">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-card">
                <div class="layui-card-header">权限分配</div>
                <div class="layui-card-body">
                    @foreach($auth as $key => $val)
                        <div class="layui-form-item">
                            <div class="layui-input-inline">
                                <input type="checkbox" value="{{ $key }}" title="{{ $key }}" lay-skin="primary">
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    @foreach($val as $val2)
                                        <input type="checkbox" @if(in_array($val2['id'], $RoleAuth)) checked @endif value="{{ $val2['id'] }}" title="{{ substr($val2['name'], stripos($val2['name'], ']')+1) }}" lay-skin="primary" class="auth">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr class="layui-bg-black">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="submitBut">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
    <script>
        layui.use('form', function(){
            var form = layui.form;

            //各种基于事件的操作，下面会有进一步介绍

            form.on('submit(submitBut)', function(data){
                var menu = [];
                $('.menu').each(function(i,v){
                    if ($(v).prop('checked')) {
                        menu[i] = $(v).val();
                    }
                });

                if (!menu.length) {
                    menu = '';
                }
                // console.log(menu);
                var auth = [];
                $('.auth').each(function(i,v){
                    if ($(v).prop('checked')) {
                        auth[i] = $(v).val();
                    }
                });
                if (!auth.length) {
                    auth = '';
                }
                var index = layer.load();
                ajax('/RoleEdit', 'post', {menu:menu,auth:auth,name:data.field.name,id:data.field.id}, function(e){
                    if (200 != e.code) {
                        layer.close(index);
                        layer.msg(e.msg, {icon: 5,anim: 6,time:2000});
                    }
                    layer.close(index);
                    layer.msg(e.msg, {icon: 6, time: 1000}, function() {
                        location.href = '/RoleManagement';
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

</html>