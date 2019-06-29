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
			<form id="addForm" class="layui-form" action="CatsAdd" method="post">
				@csrf
				<input type="hidden" name="parentId" value="{{ $parentId }}">
				<div class="layui-form-item">
					<label class="layui-form-label">商品分类名称</label>
					<div class="layui-input-inline shortInput">
						<input type="text" name="catName" required   class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">分类名称缩写</label>
					<div class="layui-input-inline shortInput">
						<input type="text" name="simpleName" required   class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">是否显示</label>
					<div class="layui-input-block">
						<input type="radio" name="isShow" value="1" title="显示" checked>
						<input type="radio" name="isShow" value="0" title="隐藏">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">是否首页楼层</label>
					<div class="layui-input-block">
						<input type="radio" name="isFloor" value="1" title="显示" checked>
						<input type="radio" name="isFloor" value="0" title="隐藏">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">排序号</label>
					<div class="layui-input-inline shortInput">
						<input type="text" name="catSort" required  class="layui-input">
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn" lay-submit lay-filter="submitBut">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>
		</div>
	</body>

</html>