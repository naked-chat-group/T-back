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
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- 公共样式 结束 -->

</head>

<body>
<div class="cBody">
    <div class="console">
        <form class="layui-form" action="OpinionManagementSearch" method="get">
            <div class="layui-form-item">
                <div class="layui-input-inline">
                    <input type="text" name="name" placeholder="输入用户名称" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn"  lay-filter="formDemo">搜索</button>
            </div>
        </form>

        <script>

        </script>
    </div>

    <table class="layui-table">
        <thead>
        <tr>
            <th>用户名称</th>
            <th>意见内容</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
        </thead>
        @foreach($list as $k=>$v)
            <tbody>
            <tr>
                <td>{{$v['nick']}}</td>
                <td>{{$v['content']}}</td>
                <td>{{date("Y-m-d H:i:s",$v['add_time'])}}</td>
                <td>
                    @if($v['reply_status']==0)
                        <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="reply({{$v['id']}})">回复</button>
                    @else
                        <button class="layui-btn layui-btn-xs layui-btn-disabled">已回复</button>
                    @endif
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    {!! $list->links() !!}
    <script>
        function reply(id) {
            layer.prompt({
                formType: 2,
                value: '',
                title: '请输入要回复的内容',
                area: ['500px', '200px'] //自定义文本域宽高
            }, function(value, index, elem){
                var comment = value
                $.ajax({
                    url:"OpinionManagementReply",
                    data:{id:id,reply_status:1,comment:comment},
                    type:'get',
                    success:function (v) {
                        history.go(0)
                    }
                })
            });
        }

    </script>
</div>
</body>

</html>