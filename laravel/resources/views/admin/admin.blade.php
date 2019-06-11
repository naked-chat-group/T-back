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
				<a href="/AdminAdd"><button class="layui-btn layui-btn-xs">添加管理员</button></a>
				<button class="layui-btn layui-btn-xs" id="check_all">全选</button>
				<button class="layui-btn layui-btn-xs">批量删除</button>
				<button class="layui-btn layui-btn-xs">回收站</button>
			</div>
			
			<table class="layui-table">
				<thead>
					<tr>
						<th>选择</th>
						<th>用户名</th>
						<th>角色</th>
						<th>Email</th>
						<th>上次登录时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody id="data">

				</tbody>
			</table>

			<!-- layUI 分页模块 -->
			<div id="pages"></div>
			<script>
				var flag = false;
				$("#check_all").click( function () {
                    if (false == flag) {
                        $(this).text('取消全选');
                    } else {
                        $(this).text('全选');
                    }
                    flag = !flag;
                    $(".checkbox").prop('checked', flag);
                });
				layui.use(['laypage', 'layer'], function() {
					var laypage = layui.laypage,
						layer = layui.layer;

					//总页数大于页码总数
					laypage.render({
					    elem: 'pages',
						count: {{ $count }},
						layout: ['count', 'prev', 'page', 'next', 'limit', 'skip'],
						jump: function(obj){
					      // console.log(obj)
					      var page = obj.curr;
					      var limit = obj.limit;

					      ajaxData('/getData', 'get', {page:page, size:limit}, function(e) {
					          $("#data").html(e)
						  })

					    }
					});
				});
                function ajaxData(url,method,data,callback)
                {
                    $.ajax({
                        url:url,
                        method:method,
                        data:data,
                        success:callback
                    })
                }

			</script>
		</div>
	</body>

</html>