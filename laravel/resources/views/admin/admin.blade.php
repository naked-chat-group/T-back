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
				<a href="/AdminAdd"><button type="button" class="layui-btn layui-btn-xs">
					<i class="layui-icon">&#xe608;</i> 添加管理员
				</button></a>
				<button class="layui-btn layui-btn-xs" id="check_all">全选</button>
				<button class="layui-btn layui-btn-xs">批量删除</button>
				<button class="layui-btn layui-btn-xs">回收站</button>
			</div>

			<table class="layui-hide" id="admin"></table>

			<script>
                var flag = false;

                $("#check_all").click( function () {
                    if (false == flag) {
                        $(this).text('取消全选');
                        $('.layui-unselect').addClass('layui-form-checked');

                    } else {
                        $(this).text('全选');
                        $('.layui-unselect').removeClass('layui-form-checked');
                    }
                    flag = !flag;


                });
                layui.use('table', function() {
                    var table = layui.table
                        , form = layui.form;

                    // layui.laytpl.config({
                    //     open: '<<',
                    //     close: '>>'
                    // });

                    table.render({
                        elem: '#admin'
                        ,url:'/getData'
                        ,cellMinWidth: 80
                        ,cols: [[
                            {field:'id', width:50, templet:function(d) {
                                    return '<div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" value="'+d.id+'" lay-skin="primary"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div></div><div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div></div>';
                                }}
                            ,{field:'admin_name', title:'管理员名称', width:200, unresize: true, sort: true}
                            ,{field:'roles', title:'角色名', templet:function(d) {
                            		if (null != d.roles) {
                    					return d.roles.name;
                                    } else {
                    					return '超级管理员';
                                    }
                                }}
                            ,{field:'email', title:'管理员邮箱', width:200, unresize: true}
                            ,{field:'last_time', title:'上次登录时间', width:200, unresize: true}
                            ,{field:'operation', title:'操作', templet:function(d) {
                                	if (d.id != 1) {
                                        return '<a href="/AdminEdit?id='+d.id+'"><button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon">&#xe642;</i></button></a>&nbsp;<button type="button" class="layui-btn layui-btn-sm"> <i class="layui-icon">&#xe640;</i> </button>'
                                    }
                                	return '';
                                }}
                        ]]
                        ,page: true
                    });
                    //
                });

			</script>
		</div>
	</body>

</html>