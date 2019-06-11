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
		<title></title>

		<!-- 公共样式 开始 -->
		<link rel="shortcut icon" href="images/favicon.ico"/>
		<link rel="bookmark" href="images/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<link rel="stylesheet" type="text/css" href="css/iconfont.css">
		<script type="text/javascript" src="framework/jquery-1.11.3.min.js" ></script>
		<link rel="stylesheet" type="text/css" href="layui/css/layui.css">
{{--		<link rel="stylesheet" href="css/app.css">--}}
	    <!--[if lt IE 9]>
	      	<script src="framework/html5shiv.min.js"></script>
	      	<script src="framework/respond.min.js"></script>
	    <![endif]-->
		<script type="text/javascript" src="layui/layui.js"></script>
		<!-- 滚动条插件 -->
		<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css">
		<script src="framework/jquery-ui-1.10.4.min.js"></script>
		<script src="framework/jquery.mousewheel.min.js"></script>
		<script src="framework/jquery.mCustomScrollbar.min.js"></script>
		<script src="framework/cframe.js"></script><!-- 仅供所有子页面使用 -->
		<!-- 公共样式 结束 -->
		
		<link rel="stylesheet" type="text/css" href="css/frameStyle.css">
		<script type="text/javascript" src="framework/frame.js" ></script>
		
	</head>

	<body>
		<!-- 左侧菜单 - 开始 -->
		<div class="frameMenu">
		    <div class="logo">
		        <img src="images/logo.png"/>
		        <div class="logoText">
		            <h1>爱购</h1>
		            <p>aigou</p>
		        </div>
		    </div>
		    <div class="menu">
		        <ul>
					<li>
						<a class="menuFA" href="javascript:void(0)"><i class="iconfont icon-liuliangyunpingtaitubiao03 left"></i>权限管理<i class="iconfont icon-dajiantouyou right"></i></a>
						<dl>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('RoleManagement',this)">角色</a></dt>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('AdminManagement',this)">管理员</a></dt>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('Jurisdiction',this)">权限资源</a></dt>
						</dl>
					</li>
		        	<li>
		                <a class="menuFA" href="javascript:void(0)"><i class="iconfont icon-shangpin left"></i>商品管理<i class="iconfont icon-dajiantouyou right"></i></a>
		                <dl>
		                	<dt><a href="javascript:void(0)" onclick="menuCAClick('ShopManagement',this)">基本商品库</a></dt>
		                	<dt><a href="javascript:void(0)" onclick="menuCAClick('ShopManagementAdd',this)">添加商品</a></dt>
		                </dl>
		            </li>
					<li>
						<a class="menuFA" href="javascript:void(0)"><i class="iconfont icon-liuliangyunpingtaitubiao03 left"></i>商品分类管理<i class="iconfont icon-dajiantouyou right"></i></a>
						<dl>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('ClassManagementAdd',this)">添加商品分类</a></dt>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('ClassManagement',this)">商品分类列表</a></dt>
						</dl>
					</li>
					<li>
						<a class="menuFA" href="javascript:void(0)"><i class="iconfont icon-liuliangyunpingtaitubiao03 left"></i>商品属性管理<i class="iconfont icon-dajiantouyou right"></i></a>
						<dl>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('CommodManagementAdd',this)">添加商品属性</a></dt>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('CommodManagement',this)">商品属性列表</a></dt>
						</dl>
					</li>
		            <li>
		                <a class="menuFA" href="javascript:void(0)"><i class="iconfont icon-shangpin left"></i>订单管理<i class="iconfont icon-dajiantouyou right"></i></a>
		                <dl>
		                	<dt><a href="javascript:void(0)" onclick="menuCAClick('OrderManagement',this)">订单管理</a></dt>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('OrderManagementList',this)">投诉订单</a></dt>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('OrderManagementUpdate',this)">退款订单</a></dt>
		                </dl>
		            </li>
		        	<li>
		                <a class="menuFA" href="javascript:void(0)"><i class="iconfont icon-shangpin left"></i>品牌管理<i class="iconfont icon-dajiantouyou right"></i></a>
		                <dl>
		                	<dt><a href="javascript:void(0)" onclick="menuCAClick('BrandManagement',this)">分类列表</a></dt>
		                	<dt><a href="javascript:void(0)" onclick="menuCAClick('BrandManagementList',this)">基本商品库</a></dt>
		                	<dt><a href="javascript:void(0)" onclick="menuCAClick('BrandManagementAdd',this)">添加商品分类</a></dt>
		                </dl>
		            </li>
					<li>
						<a class="menuFA" href="javascript:void(0)"><i class="iconfont icon-shangpin left"></i>商品管理<i class="iconfont icon-dajiantouyou right"></i></a>
						<dl>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('ShopManagement',this)">商品列表</a></dt>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('ShopManagementAdd',this)">添加商品</a></dt>
						</dl>
					</li>
					<li>
						<a class="menuFA" href="javascript:void(0)"><i class="iconfont icon-shangpin left"></i>仓库管理<i class="iconfont icon-dajiantouyou right"></i></a>
						<dl>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('WarehouseManagement',this)">仓库列表</a></dt>
							<dt><a href="javascript:void(0)" onclick="menuCAClick('WarehouseManagementAdd',this)">添加仓库</a></dt>
						</dl>
					</li>
		        </ul>
		    </div>
		</div>
		<!-- 左侧菜单 - 结束 -->
		
		<div class="main">
			<!-- 头部栏 - 开始 -->
			<div class="frameTop">
				<img class="jt" src="images/top_jt.png"/>
				<div class="topMenu">
					<ul>
						<li><a href="javascript:void(0)" onclick="menuCAClick('tgls/modify_password.html',this)"><i class="iconfont icon-yonghu1"></i>管理员</a></li>
						<li><a href="javascript:void(0)" onclick="menuCAClick('tgls/modify_password.html',this)"><i class="iconfont icon-xiugaimima"></i>修改密码</a></li>
						<li><a href="login.html"><i class="iconfont icon-084tuichu"></i>注销</a></li>
					</ul>
				</div>
			</div>
			<!-- 头部栏 - 结束 -->
			
			<!-- 核心区域 - 开始 -->
			<div class="frameMain">
				<div class="title" id="frameMainTitle">
					<span><i class="iconfont icon-xianshiqi"></i>后台首页</span>
				</div>
				<div class="con">
{{--					@section('sidebar')--}}
{{--						This is the master sidebar.--}}
{{--					@show--}}
					<iframe id="mainIframe" src="/show" scrolling="no"></iframe>
				</div>
			</div>

			<!-- 核心区域 - 结束 -->
		</div>
	</body>

</html>