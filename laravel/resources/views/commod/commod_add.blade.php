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
			<form id="addForm" class="layui-form" action="">
				<div class="layui-form-item">
					<label class="layui-form-label">属性名称</label>
					<div class="layui-input-block">
						<input type="text" name="attrName" required lay-verify="required" autocomplete="off" class="layui-input">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">属性值</label>
					<div class="layui-input-block">
						<input type="password" name="password" autocomplete="off" class="layui-input">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">是否显示</label>
					<div class="layui-input-block">
						<input type="radio" name="isShow" value="1" title="是" checked>
						<input type="radio" name="isShow" value="0" title="否">
					</div>
				</div>
				<div class="layui-form-item" id="type">
					<label class="layui-form-label">分类</label>
	                <div class="layui-input-inline" id="1">
	                    <select name="provid"  lay-filter="provid">
	                        <option value=" "></option>
							@foreach ($data as $user)
								<option value="{{$user->catId}}">{{$user->catName}}</option>
							@endforeach

	                    </select>
	                </div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">是否有效：</label>
					<div class="layui-input-block">
						<input type="radio" name="dataFlag" value="1" title="有效" checked>
						<input type="radio" name="dataFlag" value="-1" title="无效">
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
				layui.use(['upload','form'], function() {
					var form = layui.form;
					var upload = layui.upload;
					var layer = layui.layer;
					//监听提交
					form.on('submit(submitBut)', function(data) {
						return false;
					});
					form.verify({
						//数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
					  	ZHCheck: [
						    /^[\u0391-\uFFE5]+$/
						    ,'只允许输入中文'
					  	] 
					});
					form.on('select()', function(data){
						var that = $(this);
						var id = that.data('id');

						ajax('CommodManagementTwo',{catId:data.value},function(data){
							if(data.length)
							{
								str = constr(data,id);
								if($('#'+(id+1)).length != 0)
								{
									$('#type').append(str);
								}
								else
								{
									$('#'+(id+1)).html(str);
								}
								form.render('select');
							}
						});
					});

				});
				function constr(data,ids){
					var str="";
					str += "<div class='layui-input-inline' id='"+ids+"'>";
					str+="<select name='provid' id='' lay-filter='provid'>";
					str+="<option value= ''></option>";
					$.each( data, function(i,n){
					str+="<option value='"+n.catId+"'>"+n.catName+"</option>";
					});
					str+="</select>";
					str+="</div>";
					return str;
				}
				function ajax(url,data,detal){
					$.ajax({
						url: url,
						data: data,
						type: "Post",
						dataType: "json",
                        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                        success: detal
					})
				}
			</script>

		</div>
	</body>

</html>