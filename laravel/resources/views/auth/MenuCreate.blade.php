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
    <form id="addForm" class="layui-form" action="javascript:void(0)">
        <input type="hidden" value="{{ $parentMenu['id'] }}" name="parentId">
        <div class="layui-form-item">
            <label class="layui-form-label">操作面板</label>
            <div class="layui-input-block">
                <div id="test1"></div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="submitBut">立即保存</button>
            </div>
        </div>
    </form>
    <script>

        layui.use(['transfer','form'], function() {
            var transfer = layui.transfer
                ,form = layui.form;

            var data = [
                @foreach($childMenu as $key => $val)
                    {"value": "{{ $val['id'] }}", "title": "{{ $val['name'] }}", "disabled": "", "checked": ""}
                @endforeach
            ];
            var value = [
                @foreach($ownMenu as $key => $val)
                {{ $val['right']['id'] }}
                @endforeach
            ];

            //渲染
            transfer.render({
                elem: '#test1'  //绑定元素
                , title: [
                    '子级菜单',
                    '{{ $parentMenu['name'] }}'
                ]
                , data: data
                , value:value
                ,showSearch: true
                , id: 'demo1' //定义索引
            });

            form.on('submit(submitBut)', function(data) {
                var childMenu = transfer.getData('demo1');
                var child = {};
                $.each(childMenu, function(i,v) {
                    child[i] = v.value;
                });
                data.field.child = child;
                var index = layer.load();
                ajax('/MenuStore', 'post', data.field, function(e){
                    if (200 != e.code) {
                        layer.close(index);
                        layer.msg(e.msg, {icon: 5,anim: 6,time:2000});
                        return;
                    }
                    layer.close(index);
                    layer.msg(e.msg, {icon: 6, time: 1000}, function() {
                        location.href = '/AuthManagement';
                    })
                });
                return false;
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