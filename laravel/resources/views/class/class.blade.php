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

			</div>
			<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
			<table id="auth-table" class="layui-table" lay-filter="auth-table"></table>
			<script>
				//修改规格
				layui.config({
					base: '/module/'
				}).extend({
					treetable: 'treetable-lay/treetable'
				}).use(['table','form','treetable'] , function() {
					var table = layui.table
							, form = layui.form
							, treetable = layui.treetable;
					layer.load(2);
					treetable.render({
						treeColIndex:1,
						treeSpid:0,
						treeIdName: 'catId',
						treePidName: 'parentId',
						treeDefaultClose: true,
						treeLinkage: false,
						elem: '#auth-table',
						url: '/CatsPage',
						cols: [[
							 {type: 'checkbox'},
							{field: 'catName',width:230, title: '分类名称'},
							{field: 'simpleName',width:150, title: '分类缩写'},
							{field: 'isShow', title: '是否显示',width:150,templet: function(d){
									return '<input type="checkbox" name="sex" switch_id="'+d.catId+'" switch_key="isShow" switch_isShow="'+d.isShow+'" value="'+d.idShow+'" lay-skin="switch" lay-text="显示|隐藏" lay-filter="isShow" '+(d.isShow == 1 ? "checked" : "")+'>';
								}},
							{field: 'isFloor', title: '是否显示楼层',width:150,  templet: function(d){
								return '<input type="checkbox" name="sex" switch_id="'+d.catId+'" switch_key="isFloor" switch_isShow="'+d.isFloor+'"  value="'+d.isFloor+'" lay-skin="switch" lay-text="显示|隐藏" lay-filter="isShow" '+(d.isFloor == 1 ? "checked" : "")+'>';
								}},
							{field: 'catSort', title: '排序号', width:150,  sort: true},
							{field: '',title:'操作' ,width:300,templet: function(d)
								{
									var html = "";
									html +='<a href="ClassManagementAdd?parentId='+d.catId+'"><button type="button" class="layui-btn"><i class="layui-icon">&#xe608;</i> 添加二级分类</button></a>';
									html +='<a href="CatsUpd?catId='+d.catId+'"><button type="button" class="layui-btn"><i class="layui-icon layui-icon-edit"></i></button></a>';
									html +='<button type="button" class="layui-btn delete" id="'+d.catId+'"><i class="layui-icon layui-icon-delete" ></i></button>'
									return html;
								}}
						]],

						done: function () {
							layer.closeAll('loading');
						}
					});
					form.on('switch(isShow)',function(data)
					{
						//开关是否开启，true或者false
						var checked = data.elem.checked;
                        var switch_isShow = data.elem.attributes['switch_isShow'].nodeValue;
                        var switch_key = data.elem.attributes['switch_key'].nodeValue;
                        var switch_id = data.elem.attributes['switch_id'].nodeValue;
						console.log(switch_isShow);
						console.log(switch_key);


                        layer.msg('确定要修改吗？', {
                            time: 5000, //5s后自动关闭
                            btn: ['确定', '取消']
                            , yes: function (index) {
                                $.post('CatstypeUpd',{switch_id:switch_id,switch_key:switch_key,switch_isShow:switch_isShow,"_token": $('#token').val()},function(msg)
                                {
                                    if(msg.code == 1001){
                                        if(switch_isShow == 1)
                                        {
                                            data.elem.attributes['switch_isShow'].nodeValue = 0;
                                        }else {
                                            data.elem.attributes['switch_isShow'].nodeValue = 1;
                                        }
                                        var icon = 6;
                                    }else if(msg.code == 1002){
                                        var icon = 2;
                                    }else if(msg.code == 1004) {
                                        layui.use('layer', function () {
                                            layer.msg(msg.msg, {icon: 2});
                                        })
                                        return;
                                    }
                                    layui.use('layer',function()
                                    {
                                        layer.msg(msg.msg, {icon: icon});
                                    })
                                },'json')
                                data.elem.checked = checked;
                                form.render('checkbox');
                                layer.close(index);
                            }
                            , btn2: function (index) {
                                //按钮【按钮二】的回调
                                data.elem.checked = !checked;
                                form.render('checkbox');
                                layer.close(index);
                                return false; //开启该代码可禁止点击该按钮关闭
                            }
                        });
					});
				});

				//删除
				$(document).on('click','.delete',function()
				{
					var catId = $(this).attr('id');
					var obj = $(this);
					$.post('CatsDel',{catId:catId,"_token": $('#token').val()},function(msg)
					{
						if(msg.code == 1001){
							var icon = 6;
						}else if(msg.code == 1002){
							var icon = 2;
						}else if(msg.code == 1003){
							var icon = 5;
						}else if(msg.code == 1004){
                            layui.use('layer',function()
                            {
                                layer.msg(msg.msg, {icon: 2});
                            })
                            return;
                        }
						obj.parents('tr').remove();
						layui.use('layer',function()
						{
							layer.msg(msg.msg, {icon: icon});
						})
					},'json');
				});
			</script>
		</div>
	</body>

</html>