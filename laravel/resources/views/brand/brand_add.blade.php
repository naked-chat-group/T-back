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
			.layui-form-label{
				width: 100px;
			}
			.layui-input-block{
				margin-left: 130px;
			}
			.layui-form{
				margin-right: 30%;
			}
		</style>

	</head>

	<body>
		<div class="cBody">
			<form id="addForm" class="layui-form" action="javascript:void(0)">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<div class="layui-form-item">
					<label class="layui-form-label">品牌名称</label>
					<div class="layui-input-block">
						<input type="text" id="brandName" name="brandName" required lay-verify="required" autocomplete="off" class="layui-input">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">所属分类</label>
					<div class="layui-input-block">
						@foreach($cats as $val)
							<input type="checkbox"  class="cat_Id"  value="{{ $val['catId'] }}" name="cat_Id[]"  title="{{ $val['catName'] }}">
						@endforeach
					</div>
				</div>
				<div class="layui-upload">
					<label class="layui-form-label">品牌图片</label>
					<div class="upload" id="test1">+</div>
					<div class="layui-upload-list"></div>
					<div><button type="button" class="layui-btn-radius" id="save"><i class="layui-icon ">&#xe67c;</i>点击上传</button></div>
				</div>
				<div class="layui-form-item layui-form-text">
					<label class="layui-form-label">品牌介绍</label>
					<div class="layui-input-block">
						<textarea name="desc" id="brandDesc" name="brandDesc" placeholder="请输入内容" class="layui-textarea"></textarea>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">排序号</label>
					<div class="layui-input-block">
						<input type="text" id="sortNo" name="sortNo" required lay-verify="required" autocomplete="off" class="layui-input">
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">

						<button class="layui-btn" lay-submit lay-filter="submitBut" >立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>
			
			
			<script>



				layui.use(['upload','form'], function() {

					var form = layui.form;
					var upload = layui.upload;
					var layer = layui.layer;
					var $ = layui.jquery;
					var _token = $('#token').val();
					form.verify({
						//数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
					  	ZHCheck: [
						    /^[\u0391-\uFFE5]+$/
						    ,'只允许输入中文'
					  	] 
					});

						//执行实例
						var uploadInst = upload.render({
							elem: '#test1', //绑定元素
							multiple: true,
							auto: false,
							data:{
								_token:_token
							},
							acceptMime: 'image/*',
							bindAction: "#save",//绑定上传
							url: 'BrandManagementUpload', //上传接口
							choose: function (obj) { //obj参数包含的信息，跟 choose回调完全一致
								//将每次选择的文件追加到文件队列

								files = obj.pushFile();

								//layer.load(); //上传loading
								obj.preview(function (index, file, result) {
									$(".layui-upload-list").append('<img src="' + result + '" id="remove_' + index + '" title="双击删除该图片" style="width:200px;height:auto;">')
									$('#remove_' + index).bind('dblclick', function () {//双击删除指定预上传图片
										delete files[index];//删除指定图片
										$(this).remove();
									})
									//console.log(1, index); //得到文件索引
									//console.log(2, file.name); //得到文件对象
									//console.log(3, result); //得到文件base64编码，比如图片
								})
							},
							done: function (res) {


								var brandImg = res.path;

								if (res.code == 1000) {
									layer.msg("图片上传成功！", { icon: 1, time: 1000 });
									//监听提交
									form.on('submit(submitBut)', function(data) {
										var brandName = $('#brandName').val();
										// var cat_Id = $('#')
										var brandDesc = $('#brandDesc').val();
										var cat_Id="";
										$('.cat_Id').each(function(i,v){
											if ($(v).prop('checked')){
												cat_Id += ','+$(v).val();
											}
										});
										cat_Id=cat_Id.substr(1);

										var sortNo = $('#sortNo').val();

										$.post('BrandManagementAdds',{brandName:brandName,cat_Id:cat_Id,brandDesc:brandDesc,sortNo:sortNo,brandImg:brandImg,_token:_token},function(msg)
										{
											if (msg.code == 1001) {
												layer.msg(msg.msg, {icon: 1, time: 1000});
											}else {
												layer.msg(msg.msg, {icon: 5, time: 1000});
											}
										})
										return false;
									});
								}
								//上传完毕回调
							},
							error: function () {
								//请求异常回调
							}
						});


				});
			</script>

		</div>
	</body>

</html>