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
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>穷在闹市出品</title>
		<base href="/">
		<!-- 公共样式 开始 -->
		<link rel="shortcut icon" href="images/favicon.ico"/>
		<link rel="bookmark" href="images/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<link rel="stylesheet" type="text/css" href="css/iconfont.css">
		<script type="text/javascript" src="framework/jquery-1.11.3.min.js"></script>
		<link rel="stylesheet" type="text/css" href="layui/css/layui.css">
		<script type="text/javascript" src="layui/layui.js"></script>
		<!-- 公共样式 结束 -->
		
		<link rel="stylesheet" type="text/css" href="css/login1.css">
		<script type="text/javascript" src="js/login1.js"></script>
	</head>

	<body>
		<div class="loginBg"></div>
		<div class="login_main">
			<div class="box">
				<div class="left">
					<img src="images/logo.png" />
					<p></p>
				</div>
				<div class="right">
					<form class="layui-form layui-form-pane">
						<div class="layui-form-item">
							<label class="layui-form-label login_title"><i class="iconfont icon-gerenzhongxin-denglu"></i></label>
							<div class="layui-input-block login_input">
								<input type="text" name="admin_name" required lay-verify="required" autocomplete="off" placeholder="请输入您的用户名" class="layui-input" id="name">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label login_title"><i class="iconfont icon-mima1"></i></label>
							<div class="layui-input-block login_input">
								<input type="password" name="password" required lay-verify="required" autocomplete="off" placeholder="请输入密码" class="layui-input" id="pwd" onblur="changepwd()">
								<span id="pwd1"></span>
							</div>
						</div>
						<div id="c1"></div>
						<div class="layui-form-item">
							<button class="layui-btn layui-btn-fluid login_but" lay-submit lay-filter="loginBut" id="btn">登 录</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<script src="https://cdn.dingxiang-inc.com/ctu-group/captcha-ui/index.js"></script>
<script src="/js/jquery.min.js"></script>
<script>
	var myCaptcha = _dx.Captcha(document.getElementById('c1'), {
		appId: '8ad5be8319737e8a0119770f7b5ff7e4', //appId，在控制台中“应用管理”或“应用配置”模获取
		style: 'popup', // 可省略
		success:function (token) {
			$.post('verityToken',{token:token},function (data) {
				if (data == 3){
					alert('token获取失败');
					return;
				}
				// layer.msg(JSON.stringify(data.field));
				var name = $("#name").val();
				var pwd = $("#pwd").val();
				$.ajax({
					url:'login',
					type:'post',
					data:{name:name,pwd:pwd},
                    headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
					dataType:'json',
					success:function (data) {
						if (data == 1){
							alert('用户不存在');
						}
						if (data == 2){
							alert('密码错误');
						}
						if (data == 4){
							alert('密码设置已超过一个月，请及时修改');
							window.location.href="http://www.shop.com/update";
						}
						if (data == 5){
							alert('登陆成功');
							window.location.href="http://www.shop.com/index";
						}
					}
				});
			})
		}
	});
    function changepwd() {
        var pwd = $("#pwd").val();
        var reg = /(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[$@!%*#?&])[A-Za-z\d$@!%*#?&]{6,}$/;
        if (!reg.test(pwd)){
            $("#pwd1").html("<span style='color: red'>密码格式不正确<span>");
        }
        else{
            $("#pwd1").html("<span style='color: green'>√</span>");
        }
    }
    layui.use('form', function() {
        var form = layui.form;
        //监听提交
        form.on('submit(loginBut)', function (data) {
            myCaptcha.show();
            return false;
        });
        //监听用户类型，改变风格
    })
</script>
