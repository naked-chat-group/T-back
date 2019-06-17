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
			.layui-table img {
			    max-width: none;
			}
		</style>

	</head>

	<body>
		<div class="cBody">
			<div class="console">
				<div class="demoTable">
					搜索品牌：
					<div class="layui-inline">
						<input class="layui-input" name="brandName" placeholder="请输入品牌名称" id="demoReload" autocomplete="off">
					</div>
					<button class="layui-btn" data-type="reload">搜索</button>
				</div>


				<script>
					layui.use('form', function() {
						var form = layui.form;
				
						//监听提交
						form.on('submit(formDemo)', function(data) {
							layer.msg(JSON.stringify(data.field));
							return false;
						});
					});
				</script>
			</div>

			<table class="layui-hide" id="test"></table>
			<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

			<script>

				layui.use('table', function() {
					var table = layui.table;

					table.render({
						elem: '#test',
						url: 'BrandManagementPages',
						page:true,
						cols: [[
							{field: 'brandId',width:230, title: '#'},
							{field: 'brandImg',width:230, title: '品牌图片',templet: function(d){
									return '<img src="'+d.brandImg+'" alt="" width="30px" height="30px">';
								}},
							{field: 'brandName',width:150, title: '品牌名称'},
							{field: 'brandDesc',width:150, title: '品牌简介'},
							{field: 'sortNo',width:150, title: '排序号',sort: true},
							{field: '',title:'操作' ,width:300,templet: function(d)
							{
								var html = "";
								html +='<button class="layui-btn layui-btn-xs" onclick="updateBut('+d.brandId+')">修改</button>';
								html +='<button class="layui-btn layui-btn-xs" id="brandDel" brandId='+d.brandId+'>删除</button>';
								return html;
							}}
						]], id: 'testReload'
							,
						done:function(res,curr,count){
							hoverOpenImg();//显示大图
							}
					});
					var $ = layui.$;
					active = {
						reload: function(){
							var demoReload = $('#demoReload');
							//执行重载
							table.reload('testReload',{
								page: {
									curr: 1 //重新从第 1 页开始
								},where: {
									brandName: demoReload.val()
								}
							}, 'data');
						}
					};

					$('.demoTable .layui-btn').on('click', function(){
						var type = $(this).data('type');
						active[type] ? active[type].call(this) : '';
					});
					$(document).on('click','#brandDel',function() {
						var brandId = $(this).attr('brandId');
						obj = $(this);
						$.post('BrandManagementDel',{brandId:brandId,"_token": $('#token').val()},function(msg)
						{
							if(msg.code == 1001){
								var icon = 6;
							}else if(msg.code == 1002){
								var icon = 2;
							}
							$(obj).parents('tr').remove();
							active.reload();
							layui.use('layer',function()
							{
								layer.msg(msg.msg, {icon: icon});
							})
						},'json');
					})
				});

				//图片划过放大
				function hoverOpenImg(){
					var img_show = null; // tips提示
					$('td img').hover(function(){
						var kd=$(this).width();
						kd1=kd*3;          //图片放大倍数
						kd2=kd*3+30;       //图片放大倍数
						var img = "<img class='img_msg' src='"+$(this).attr('src')+"' style='width:"+kd1+"px;' />";
						img_show = layer.tips(img, this,{
							tips:[2, 'rgba(41,41,41,.5)']
							,area: [kd2+'px']
						});
					},function(){
						layer.close(img_show);
					});
					$('td img').attr('style','max-width:70px;display:block!important');
				}
				//修改规格
				function specificationsBut(){
					layui.use('layer', function() {
						var layer = layui.layer;
						//iframe层-父子操作
						layer.open({
							type: 2,
							area: ['70%', '60%'],
							fixed: false, //不固定
							maxmin: true,
							content: 'specifications_list.html'
						});
					});
				}
				//修改按钮
				var updateFrame = null;
				function updateBut(brandId){
					layui.use('layer', function() {
						var layer = layui.layer;
						//iframe层-父子操作
						updateFrame = layer.open({
                    		title: "品牌信息修改",
							type: 2,
							area: ['80%', '90%'],
							scrollbar: false,	//默认：true,默认允许浏览器滚动，如果设定scrollbar: false，则屏蔽
							maxmin: true,
							content: 'BrandManagementUpd?brandId='+brandId
						});
					});
				}
			</script>
		</div>
	</body>

</html>