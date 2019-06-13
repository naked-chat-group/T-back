<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<form action="">
    {{ csrf_token() }}
    <div class="form-group" style="margin-left: 500px;margin-top: 180px;">
        <label for="exampleInputEmail1">新密码：</label>
        <input type="password" class="form-control" id="pwd" placeholder="新密码" name="password" style="width: 350px;">
        <span id="pwd1"></span>
    </div>
    <div class="form-group" style="margin-left: 500px;">
        <label for="exampleInputEmail1">确认密码：</label>
        <input type="password" class="form-control" id="repwd" placeholder="确认密码" style="width: 350px;">
        <span id="pwd2"></span>
    </div>
    <button type="submit" class="btn btn-success" style="margin-left: 500px;">确认修改</button>
</form>
</body>
</html>