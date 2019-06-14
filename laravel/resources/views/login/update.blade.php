<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/layui/css/layui.css"  media="all">
    <title>Document</title>
</head>
<body>
<form class="layui-form" style="margin-left: 300px;">
    <div class="layui-form-item" style="margin-top: 200px;">
        <label class="layui-form-label" style="margin-left: 50px;">密码</label>
        <div class="layui-input-block">
            <input type="password" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input" style="width: 300px;" lay-verify="password" id="pwd">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" style="margin-left: 50px;">确认密码</label>
        <div class="layui-input-block">
            <input type="password" placeholder="请输入确认密码" autocomplete="off" class="layui-input" style="width:300px;" onblur="changepwd()" id="repwd">
            <span id="pwd1"></span>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="changeBut">确认修改</button>
        </div>
    </div>
</form>
</body>
</html>
<script src="/layui/layui.js" charset="utf-8"></script>
<script src="/js/jquery.min.js"></script>
<script>
    layui.use('form',function () {
        var form = layui.form;
        form.verify({
            password:[
                /(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[$@!%*#?&])[A-Za-z\d$@!%*#?&]{6,}$/
                ,'密码必须由6-30位大小写字母、数字、特殊字符组成'
            ],
        })
        form.on('submit(changeBut)',function (data) {
            $.ajax({
                url:'changepwd',
                data:{pwd:$("#pwd").val()},
                type:'post',
                headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                dataType:'json',
                success:function (data) {
                    if (data == 1){
                        alert('密码不能与上一次密码一致');
                        window.location.href="http://www.shop.com/update";
                    }
                    if (data == 2){
                        alert('修改成功');
                        window.location.href="http://www.shop.com/";
                    }
                    if (data == 3){
                        alert('密码不能与前两次密码一样');
                        window.location.href="http://www.shop.com/update";
                    }
                    if (data == 4){
                        alert('密码不能与前三次密码一致');
                        window.location.href="http://www.shop.com/update";
                    }
                }
            })
            return false;
        })
    });
    function changepwd() {
        var pwd = $("#pwd").val();
        var repwd = $("#repwd").val();
        if (pwd != repwd){
            $("#pwd1").html("<span style='color: red'>密码与确认密码不一致<span>");
            return false;
        }
        else{
            $("#pwd1").html("<span style='color: green'>√<span>");
        }
    }
</script>