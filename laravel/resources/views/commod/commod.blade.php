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

	<div class="demoTable">
		搜索属性名称：
		<div class="layui-inline">
			<input class="layui-input" name="id" id="demoReload" autocomplete="off">
		</div>
		<button class="layui-btn" data-type="reload">搜索</button>
	</div>

	<table class="layui-hide" id="LAY_table_user" lay-filter="user"></table>
    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-xs" lay-event="edit">修改</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
    <script>
        var tableIns = '';
        function ajax(url,data,type,detal)
        {
            $.ajax({
                url:url,
                data:data,
                type:type,
                dataType:'json',
                success:detal
            })
        }

		layui.use('table', function(){
			var table = layui.table,form = layui.form;
            table.on('tool(user)', function(obj){ //注：tool 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"
                var data = obj.data //获得当前行数据
                    ,layEvent = obj.event; //获得 lay-event 对应的值
                if(layEvent === 'del'){
                    layer.confirm('真的删除行么', function(index){

                        //向服务端发送删除指令
                        ajax('CommodManagementDel',{attrId:obj.data.attrId},'get',function (data) {
							if(data.code == 1)
							{
								obj.del(); //删除对应行（tr）的DOM结构
								layer.close(index);
								layer.msg(data.message);
                                active['reloads'].call(this);
								return false;
							}
								layer.msg(data.message);
                        })
                    });
                } else if(layEvent === 'edit'){
                    layer.open({
                        type: 2,
                        skin: 'layui-layer-rim', //加上边框
                        area: ['1000px', '600px'], //
                        anim:3,
                        content: 'CommodManagementUpdate/'+obj.data.attrId, //这里content是一个普通的String
                        success:function (layero, index) {
                            console.log(layero, index);
                        }
                    });
                }else if(layEvent === 'load'){
                    layer.open({
                        type: 2,
                        skin: 'layui-layer-rim', //加上边框
                        area: ['1000px', '600px'], //
                        anim:3,
                        content: 'CommodManagementUpdateShu/'+obj.data.attrId, //这里content是一个普通的String
                        success:function (layero, index) {
                            console.log(layero, index);
                        }
                    });
                }
            });
			//方法级渲染
			 tableIns = table.render({
				elem: '#LAY_table_user'
				,url: 'CommodManagementInputs'
				,cols: [[
					{checkbox: true, fixed: true},
					{field:'attrId', title:'属性id'}
					,{field:'attrName', title:'属性名称'}
					,{field:'goodsCatPath', title:'商品分类'}
					,{field:'goodsCatId', title:'最后一级商品分类ID'}
					,{field:'attrVal', title:'属性值(可点)',event:'load'}
					,{field:'isShow', title:'是否显示', templet: function(d){
						return '<input type="checkbox" name="isShow" attrid="'+d.attrId+'" value="'+d.isShow+'" lay-skin="switch" lay-text="yes|no" lay-filter="sexDemo" '+(d.isShow == 1 ? 'checked':'')+'>';
						}}
					,{field:'dataFlag', title:'有效状态',templet: function(d){
							return '<input type="checkbox" name="dataFlag" attrid="'+d.attrId+'" value="'+d.dataFlag+'" lay-filter="lockDemo" title="有效" '+(d.dataFlag == 1 ? 'checked':'')+'>';
						}}
                    ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}
				]]
				,id: 'testReload'
				,page: true
				,height: 500
			});
			form.on('switch(sexDemo)', function(obj){
			    var that = $(this);
			    var val = $(this).val();
                ajax('CommodManagementUpdshow',{attrId:$(this).attr('attrId'),isShow:$(this).val()},'post',function (data) {
                    if(data.code == 1)
                    {
                        if(val == 1)
                        {
                            that.val(0);
                        }
                        else
                        {
                            that.val(1)
                        }
                        layer.msg('成功');
                    }
                })
			});
            form.on('checkbox(lockDemo)', function(obj){
                var that = $(this);
                var val = $(this).val();
                ajax('CommodManagementUpdflag',{attrId:$(this).attr('attrId'),flag:$(this).val()},'post',function (data) {
                    if(data.code == 1)
                    {
                        if(val == 1)
                        {
                            that.val(0);
                        }
                        else
                        {
                            that.val(-1)
                        }
                        layer.msg('成功');
                    }
                })
            });
			var $ = layui.$, active = {
				reload: function(){
					var demoReload = $('#demoReload');

					//执行重载
					table.reload('testReload', {
						page: {
							curr: 1 //重新从第 1 页开始
						}
						,where: {
							key: demoReload.val()
						}
					}, 'data');
				},
                reloads:function () {
                    tableIns.reload({
                        page: {
                            curr: 1 //重新从第 1 页开始
                        }
                    });
                }
			};
            $('.demoTable .layui-btn').on('click', function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });


        });

	</script>

	</body>

</html>