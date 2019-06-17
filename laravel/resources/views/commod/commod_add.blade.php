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
		<script src="js/tabControl.js"></script>
		<style>
			.layui-form-label{
				width: 100px;
			}
			.layui-input-block{
				margin-left: 130px;
			}
			.layui-form{
				margin-right: 20%;
			}
			#tag{width:600px; height:300px; text-align:left; padding:10px; border:2px #E0E0E0 inset ; line-height:25px;}
			/*input post tab*/
			div.radius_shadow{border:1px solid #DBDBDB;-moz-border-radius:5px;-khtml-border-radius:5px;-webkit-border-radius:5px;border-radius: 5px;padding:5px;-webkit-box-shadow:0 0 10px #414141;-moz-box-shadow:0 0 10px #414141;box-shadow:0 0 10px #414141;font-size:12px;background:#fff;}
			span#radius{display:inline-block;float:none;font-size:12px;padding:2px 5px;margin:-2px 5px 15px;border:1px solid #E0E0E0; background-color:#F0F0F0;-moz-border-radius:5px;-khtml-border-radius:5px;-webkit-border-radius:5px;border-radius: 5px;color:#000;}
			.tabinput{margin-left:5px;border:0;}
			a#deltab{cursor:pointer;display:inline-block;color:#808080;margin-left:5px;font-weight:bold;}
			a#deltab:hover{color:#D2D2D2;text-decoration:none;}
			#getTab{ margin-top:10px;border:1px solid #E0E0E0; background-color:#F0F0F0; padding:10px; cursor:pointer;}
		</style>

	</head>

	<body>
		<div class="cBody">
			<form id="addForm" class="layui-form" action="">
				<div class="layui-form-item">
					<label class="layui-form-label">属性名称</label>
					<div class="layui-input-block">
						<input type="text" id="catName" lay-verify="required|ZHCheck" lay-reqtext="用户名是必填项，岂能为空？" lay-verify="catName" autocomplete="off" class="layui-input">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">属性值</label>
					<div class="layui-input-block">
						<div style="width:600px;margin:40px auto 0 auto;text-align:center;">
							<div id="tag"></div>
						</div>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">是否显示</label>
					<div class="layui-input-block">
						<input type="radio" class="isShow" name="isShow" value="1" title="是" checked>
						<input type="radio" class="isShow" name="isShow" value="0" title="否">
					</div>
				
				<div class="layui-form-item" id="type">
					<label class="layui-form-label">分类</label>
	                <div class="layui-input-inline" id="1">
	                    <select name="provid" class="select" lay-verify="required" lay-reqtext="请选择" lay-filter="provid">
							<option value="">请选择</option>
							@foreach ($data as $user)
								<option value="{{$user->catId}}">{{$user->catName}}</option>
							@endforeach

	                    </select>
	                </div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">是否有效：</label>
					<div class="layui-input-block">
						<input type="radio" class="dataFlag" name="dataFlag" value="1" title="有效" checked>
						<input type="radio" class="dataFlag" name="dataFlag" value="-1" title="无效">
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
				$(function(){
					$("#tag").tabControl({maxTabCount:5,tabW:80});
				});
				layui.use(['upload','form'], function() {
					var form = layui.form;
					var upload = layui.upload;
					var layer = layui.layer;
					//监听提交
					form.on('submit(submitBut)', function(data) {
						var catVal = $("#tag").getTabVals().join(",");


						var catName = $('#catName').val();
						var isShow = $('.isShow:checked').val();
						var dataFlag = $('.dataFlag:checked').val();
						var goodsCatId = '';
						var goodsCatPath = '';
						$( ".select option:selected" ).each(function(v,n) {
							goodsCatPath += $(this).text()+',';
							goodsCatId = $(this).val();
						});
						ajax('CommodManagementAdd',{attrVal:catVal,attrName:catName,isShow:isShow,dataFlag:dataFlag,goodsCatId:goodsCatId,goodsCatPath:goodsCatPath},function(data){
							if(data.code == 1)
							{
								layer.msg(data.error, {
									icon:5,
									offset: 'a',
									anim: 6
								});
							}
							else
							{
								layer.msg('添加成功', {
									icon:6,
									offset: 'a',
									anim: 6,
									success:function () {
										document.getElementById("addForm").reset();
									}
								});
							}
						})
						return false;
					});
					form.verify({
						//数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
					  	ZHCheck: [
						    /^[\u0391-\uFFE5]+$/
						    ,'只允许输入中文'
					  	] 
					});

					form.on('select(provid)', function(data){
						var that = $(this);
						var id = that.parents('.layui-input-inline').attr('id');

						$('#'+id).nextAll().remove();
						ajax('CommodManagementTwo',{catId:data.value},function(data){
							if(data.code == 1)
							{
								str = constr(data.data,id+1);
								$('#type').append(str);
								form.render('select');
							}
						});
					});

				});

				function constr(data,ids){
					var str="";
					str += "<div class='layui-input-inline' id='"+ids+"'>";
					str+="<select name='provid' id='' class='select' lay-verify='required' lay-filter='provid'>";
					str+="<option value= ''>请选择</option>";
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
						success: detal
					})
				}

			</script>
		</div>
	</body>

</html>