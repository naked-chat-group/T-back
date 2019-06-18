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
        <div>
                商品名称:
            <select name="goodsId" id="goodsId">
            @foreach($data as $k)
                    <option value="{{ $k->goodsCatId }}">{{ $k->goodsName }}</option>
            @endforeach
            </select>
        </div>
        <br>
        <div id="one">

        </div>
        <br>
        <div id="two">
            <button></button>
        </div>
</body>
<script>
        function ajax(url,data,type,detal){
            $.ajax({
                url:url,
                data:data,
                type:type,
                dataType:'json',
                success:detal
            })
        }
        var s = '';
        $('#goodsId').change(function () {
            var str = '';
            ajax('ShopManagementType',{'id':$(this).val()},'post',function(data){
                str+="<table>";
                $(data.data).each(function (i,v) {
                    str+="<tr id='"+i+"'><td>"+v.attrName+":";
                    $(v.attrVal).each(function (a,b) {
                        str+="<input value='"+b+"' class='"+i+"' id='' type='checkbox'>"+b;
                        s = i;
                    })
                    str+="</td></tr>";
                })
                str+='</table>';
                $('#one').html(str);
                $('#two').html('<button id="btn">生成表格</button>');
            })
        })
        $(document).on('click','#btn',function () {
            var str = '';
            str+='<table>';
            for (i=0;i<=s;i++)
            {
                $('#i :checkbox:checked')
            }
        })
</script>
</html>