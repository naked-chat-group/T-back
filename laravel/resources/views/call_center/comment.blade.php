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
        <form class="layui-form" action="WarehouseManagementSearch" method="get">
            <div class="layui-form-item">
                <div class="layui-input-inline">
                    <input type="text" name="name" placeholder="输入仓库名称" autocomplete="off" class="layui-input">
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
            <th>商品名称</th>
            <th>评论内容</th>
            <th>评论时间</th>
            <th>审核</th>
            <th>操作</th>
        </tr>
        </thead>
        @foreach($list as $k=>$v)
            <tbody>
            <tr>
                <td>{{$v['nick']}}</td>
                <td>{{$v['goodsName']}}</td>
                <td>{{$v['comment']}}</td>
                <td>{{date("Y-m-d H:i:s",$v['add_time'])}}</td>
                <td>
                    @if($v['status']==1)
                        <button class="layui-btn layui-btn-radius layui-btn-normal" id="btn" onclick="status(1,{{$v['id']}})">审核通过</button>
                    @else
                        <button class="layui-btn layui-btn-radius layui-btn-danger" id="btn" onclick="status(1,{{$v['id']}})">审核未通过</button>
                    @endif
                </td>
                <td>
                    <a href="Call_centerManagementshow?id={{$v['id']}}"><button class="layui-btn layui-btn-primary layui-btn-sm">查看全文</button></a>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    {!! $list->links() !!}
    <script>
        function status(i,id) {
            $.ajax({
                url:"Call_centerManagementChange",
                data:{id:id,status:i},
                type:'get',
                success:function (v) {
                    alert(v);
                    history.go(0)
                }
            })
        }

    </script>
</div>
</body>

</html>