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
			.layui-form{

			}
		</style>

	</head>

	<body>
		<div class="cBody">
			<form id="addForm" class="layui-form" action="javascript:;">
				<div class="layui-form-item" id="type">
					<label class="layui-form-label">所属分类</label>
					<div class="layui-input-inline" id="1">
						<select name="goodsCatId" class="select" lay-verify="required" lay-reqtext="请选择" lay-filter="provid">
							<option value="">请选择</option>
							@foreach ($data as $user)
								<option value="{{$user->catId}}">{{$user->catName}}</option>
							@endforeach

						</select>
					</div>
				</div>
                <hr class="layui-bg-green">
				<div class="layui-form-item">
					<label class="layui-form-label">所属品牌</label>
					<div class="layui-input-inline" id="brands">
                        <select name="brandId" class="select" lay-verify="required" lay-reqtext="请选择" lay-filter="provid">
                            <option value="">请选择</option>
                        </select>
                    </div>
				</div>
                <hr class="layui-bg-green">
				<div class="layui-form-item">
					<label class="layui-form-label">基本信息</label>
                    <div class="layui-inline">
                        <div class="layui-input-block">
                            <label class="layui-form-label">商品名称</label>
                            <div class="layui-inline">
                                <input type="text" name="goodsName" class="layui-input" name="" lay-verify="required">
                            </div>
                            <i class="iconfont icon-huaban bt"></i>
                        </div>
                        <div class="layui-input-block">
                            <label class="layui-form-label">商品描述</label>
                            <div class="layui-inline">
                                <input type="text" class="layui-input" name="goodsDesc" lay-verify="required">
                            </div>
                            <i class="iconfont icon-huaban bt"></i>
                        </div>
                        <div class="layui-input-block">
                            <label class="layui-form-label">商品售价</label>
                            <div class="layui-inline" id="shop-price">
                                <input type="text" name="marketPrice" class="layui-input" lay-verify="required">
                            </div>
                            <i class="iconfont icon-huaban bt"></i>
                        </div>
                        <div class="layui-input-block">
                            <label class="layui-form-label">商品划线价</label>
                            <div class="layui-inline">
                                <input type="text" name="shopPrice" class="layui-input" lay-verify="required">
                            </div>
                            <i class="iconfont icon-huaban bt"></i>
                        </div>
                        <div class="layui-input-block">
                            <label class="layui-form-label">上下架状态</label>
                            <div class="layui-inline">
                                <input type="radio" name="isSale" value="1" title="启用" checked>
                                <input type="radio" name="isSale" value="0" title="禁用">
                            </div>
                            <i class="iconfont icon-huaban bt"></i>
                        </div>
                        <div class="layui-input-block">
                            <label class="layui-form-label">商品库存</label>
                            <div class="layui-inline" id="shop-ku">
                                <input type="text" value="" name="goodsStock" id="kucun" lay-verify="required" class="layui-input">
                            </div>
                            <i class="iconfont icon-huaban bt"></i>
                        </div>
                        <div class="layui-input-block">
                            <label class="layui-form-label">是否是礼物</label>
                            <div class="layui-inline">
                                <input type="radio" name="isBes" value="1" title="启用" >
                                <input type="radio" name="isBes" value="0" title="禁用" checked>
                            </div>
                            <i class="iconfont icon-huaban bt"></i>
                        </div>
				</div>
                <hr class="layui-bg-green">
				<div class="layui-form-item">
					<label class="layui-form-label">添加图片</label>
                    <div class="layui-inline">
                        <div class="layui-input-block">
                            <div class="layui-upload">
                                <button type="button" class="layui-btn layui-btn-normal" id="testList">选择多文件</button>
                                <div class="layui-upload-list">
                                    <table class="layui-table">
                                        <thead>
                                        <tr><th>文件名</th>
                                            <th>图片</th>
                                            <th>大小</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr></thead>
                                        <tbody id="demoList"></tbody>
                                    </table>
                                </div>
                                <button type="button" class="layui-btn" id="testListAction">开始上传</button>
                            </div>
                            <input type="hidden" value="" name="goodsImg" id="duotu">
                        </div>
                    </div>
                </div>
                    <hr class="layui-bg-green">
				<div class="layui-form-item" id="slik">
					<label class="layui-form-label">生成SKU</label>
					<div class="layui-input-inline shortInput">
						<div class="layui-input-block" >
							<input type="radio" name="sku" value="1" title="开启" id="kaiqis" lay-filter="sku">
							<input type="radio" name="sku" value="0" title="禁用" id="kaiqi" lay-filter="sku" checked="checked">
                            <div class="layui-inline"><button type="button"  class="layui-btn layui-btn-primary layui-btn-sm" id="plshbtn" style="display: none;"><i class="layui-icon"></i></button></div>
                            <div class="layui-inline"><button type="button"  class="layui-btn layui-btn-primary layui-btn-sm" id="plshbtns" style="display: none;">添加属性</button></div>
                        </div>
					</div>
				</div>

                    <hr class="layui-bg-green">
				<div class="layui-form-item">
					<label class="layui-form-label">所属仓库</label>
                    <div class="layui-block">
                        <div class="layui-inline">
                            <select name="cangku" class="select" lay-verify="required" lay-reqtext="请选择" lay-filter="">
                                <option value="">请选择</option>
                                @foreach ($datas as $user)
                                    <option value="{{$user->id}}">{{$user->serve_area}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
				</div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="hidden" id="skutu" name="skuimg" value="">
                </div>
            </form>
		</div>
	</body>
{{--品牌分类--}}
	<script>
        var catId = '';
		layui.use(['form'], function() {
			var form = layui.form;
			var upload = layui.upload;
			var layer = layui.layer;
			{{--所属分类--}}
			form.on('select(provid)', function(data){

				var that = $(this);
				var id = that.parents('.layui-input-inline').attr('id');
				$('#'+id).nextAll().remove();
				ajax('CommodManagementTwo',{catId:data.value},'post',function(data){
					if(data.code == 1)
					{
						str = constr(data.data,id+1);
						$('#type').append(str);
                        $('#kaiqi').attr('checked',true);
                        form.render('select');
					}
					else 
					{
					//	所属品牌
                        var str = '';
                         str += '<select name="brandId" class="select" lay-verify="required" lay-reqtext="请选择">' +
                            '<option value="">请选择</option>';
                        $.each(data.data,function (i,n) {
                            str+='<option value="'+n.one.brandId+'">'+n.one.brandName+'</option>';
                        })
                        $.each(data.info,function (i,n) {
                            catId +=
                                '                                        <option value="'+n.attrId+'">'+n.attrName+'</option>\n'
                        })
                        str += '</select>';
                        $('#brands').html(str);
                        $('#kaiqi').attr('checked',true);
                        form.render('select');
					}
				});
			});
		});

		function constr(data,ids){
			var str="";
			str += "<div class='layui-input-inline' id='"+ids+"'>";
			str+="<select name='brandId' id='' class='select' lay-verify='required' lay-filter='provid'>";
			str+="<option value= ''>请选择</option>";
			$.each( data, function(i,n){
				str+="<option value='"+n.catId+"'>"+n.catName+"</option>";
			});
			str+="</select>";
			str+="</div>";
			return str;
		}
		function ajax(url,data,type,detal){
			$.ajax({
				url: url,
				data: data,
				type: type,
				dataType: "json",
				success: detal
			})
		}

	</script>
{{--文件上传--}}
    <script>
		var ca = ''//图片的路径
        layui.use('upload',function () {
            var $ = layui.jquery
                ,upload = layui.upload;


            var demoListView = $('#demoList')
                ,uploadListIns = upload.render({
                elem: '#testList'
                ,url: 'ShopManagementUpload'
                ,accept: 'file'
                ,multiple: true
                ,auto: false
                ,bindAction: '#testListAction'
                ,choose: function(obj){
                    // console.log(this)
                    var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
                    //读取本地文件

                    obj.preview(function(index, file, result){

                        var tr = $(['<tr id="upload-'+ index +'">'
                            ,'<td>'+ file.name +'</td>'
                            ,'<td><img src="'+result+'" width="50px" height="50px" onmouseover="hoverOpenImg()"></td>'
                            ,'<td>'+ (file.size/1014).toFixed(1) +'kb</td>'
                            ,'<td>等待上传</td>'
                            ,'<td>'
                            ,'<button class="layui-btn layui-btn-xs demo-reload layui-hide">重传</button>'
                            ,'<button class="layui-btn layui-btn-xs layui-btn-danger demo-delete">删除</button>'
                            ,'</td>'
                            ,'</tr>'].join(''));

                        //单个重传
                        tr.find('.demo-reload').on('click', function(){
                            obj.upload(index, file);
                        });

                        //删除
                        tr.find('.demo-delete').on('click', function(){
                            delete files[index]; //删除对应的文件
                            tr.remove();
                            uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                        });

                        demoListView.append(tr);
                    });
                }
                ,done: function(res, index, upload){
                    if(res.code == 0){ //上传成功
                        var tr = demoListView.find('tr#upload-'+ index)
                            ,tds = tr.children();
                        tds.eq(3).html('<span style="color: #5FB878;">上传成功</span>');
                        tds.eq(4).html(''); //清空操作
						ca += res.src+',';
						// console.log(ca);
                        $('#duotu').val(ca);
                        return delete this.files[index]; //删除文件队列已经上传成功的文件
                    }
                    this.error(index, upload);
                }
                ,error: function(index, upload){
                    var tr = demoListView.find('tr#upload-'+ index)
                        ,tds = tr.children();
                    tds.eq(3).html('<span style="color: #FF5722;">上传失败</span>');
                    tds.eq(4).find('.demo-reload').removeClass('layui-hide'); //显示重传
                }
            });
        })
        function hoverOpenImg(){
            var img_show = null; // tips提示
            $('td img').hover(function(){
                var kd=$(this).width();
                kd1=kd*3;          //图片放大倍数
                kd2=kd*3+30;       //图片放大倍数
                var img = "<img class='img_msg' src='"+$(this).attr('src')+"' style='width:"+kd1+"px;' />";
                img_show = layer.tips(img, this,{
                    tips:[2, 'rgba(41,41,41,.5)']
                    ,area: [kd2+'px']
                });
            },function(){
                layer.close(img_show);
            });
            $('td img').attr('style','max-width:70px;display:block!important');
        }

    </script>
{{--生成sku--}}
	<script>
        var cas = '';

        $(document).on('click','.del',function(){
            $(this).parents('.cames').remove();//删除sku
        })
        layui.use(['form','upload'], function () {
            var form = layui.form;
            var $ = layui.jquery
                ,upload = layui.upload;
            //添加sku
            $('#plshbtn').on('click',function(){
                $('#came').append(slik(catId));//添加sku
                form.render();
            })
            //添加属性
            $('#plshbtns').on('click',function(){
                $('#came').empty();
                str = slicks(catId);
                $('#came').append(str);//添加sku
                str =  '<div class="layui-input-block cass"><div class="layui-inline">\n';

                if(catId.length == 0)
                {

                    str+= '<p>请选择分类</p>';
                }
                else
                {
                    str+='<select name="spac[]" class="select" lay-verify="required" lay-filter="shuxing" lay-reqtext="请选择">\n' +
                        '                                        <option value="">请选择</option>\n'+
                        catId+
                        '                                    </select>\n';
                }

                str+='                                </div></div>\n';
                $('.cass').after(str);//添加sku属性
                form.render();
            })
            $(document).on('blur','.specStock',function () {
                var sum = 0
                $($('.specStock')).each(function (data,v) {
                    sum = sum+parseInt($(this).val());
                })
                $('#kucun').val(sum)
            })//库存求和
            $(document).on('blur','.price',function () {
                var max = $('.price:eq(0)').val();
                var min = $('.price:eq(0)').val();
                $('.price').each(function(){
                    if($(this).val()>max)
                    {
                        max = $(this).val();
                    }
                    if($(this).val()<min)
                    {
                        min = $(this).val();
                    }
                })
                $('#shop-price').html('<div class="layui-input-inline" style="width: 100px;">\n' +
                    '        <input type="text" name="marketPrice_min" value="'+min+'" disabled placeholder="￥" autocomplete="off" class="layui-input">\n' +
                    '      </div>\n' +
                    '      <div class="layui-form-mid">-</div>\n' +
                    '      <div class="layui-input-inline" style="width: 100px;">\n' +
                    '        <input type="text" name="marketPrice_max" value="'+max+'" disabled placeholder="￥" autocomplete="off" class="layui-input">\n' +
                    '      </div>');
            })//售价范围
            form.on('radio(sku)', function (data) {

                    if(data.value == 1)
                    {
                        str = slik(catId);
                        $('#slik').after(str);//添加sku
                        form.render();
                        $('#shop-price input').attr("disabled",true);//修改商品中的价格
                        $('#shop-price input').attr("placeholder","已禁用");//修改商品中的价格
                        $('#shop-ku input').attr("disabled",true);//修改商品中的库存
                        $('#shop-ku input').attr("placeholder","已禁用");//修改商品中的库存
                        $("#plshbtn").attr("style","display:block;");
                        $("#plshbtns").attr("style","display:block;");
                        var uploadInst = upload.render({
                            elem: '.test1'
                            ,url: 'ShopManagementUpload'
                            ,before: function(obj){
                                //预读本地文件示例，不支持ie8
                                obj.preview(function(index, file, result){
                                    $('#demo1').attr('src', result); //图片链接（base64）
                                });
                            }
                            ,done: function(res){
                                //如果上传失败
                                if(res.code > 0){
                                    return layer.msg('上传失败');
                                }
                                //上传成功
                                delete files[index];
                                cas = res.src
                                console.log(cas)
                                $('#skutu').val($('#skutu').val()+','+cas);

                                $('#test1').removeAttr('id');
                            }
                            ,error: function(){
                                //演示失败状态，并实现重传
                                var demoText = $('#demoText');
                                demoText.html('<span style="color: #ff5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                                demoText.find('.demo-reload').on('click', function(){
                                    uploadInst.upload();
                                });
                            }
                        });
                    }
                    else
                    {
                        $('#came').remove();
                        $('#plshbtn').attr('style','display:none');
                        $('#plshbtns').attr('style','display:none');
                    }
                form.render();

            });
            form.on('select(shuxing)', function(data){
              var  that = $(this);
                  ajax('ShopManagementValue',{val:data.value},'post',function (datas) {
                      if(datas.data != 1)
                      {
                          var str = '';

                          str+= '                                <div class="layui-inline">\n';
                          str+='<select name="shuxing[]" class="select" lay-verify="required" lay-verify="required" lay-filter="shuxing" lay-reqtext="请选择">\n' +
                              '                                        <option value="">请选择</option>\n';
                          $(datas.data).each(function (i,n) {
                              str+='<option value="'+n+'">'+n+'</option>\n';
                          })
                          str+=        '                                    </select>\n';
                          str+='                                </div>\n'
                          that.parents('.cass').append(str);
                          form.render();
                      }

                  })
            })
            //监听提交
            form.on('submit(demo1)', function(data){
                layer.alert(JSON.stringify(data.field), {
                    title: '最终的提交信息'
                })
                return false;
            });
        });
        function slicks(catId){
            var str =
                '<div class="cames">'+
                '<div class="layui-form-item ">\n' +
                '                        <div class="layui-input-block">\n' +
                '                            <label class="layui-form-label">商品名称</label>\n' +
                '                            <div class="layui-inline">\n' +
                '                                <input type="text" name="spacess[]" lay-verify="required" class="layui-input">\n' +
                '                            </div>\n' +
                '                            <div class="layui-inline"><button type="button" class="layui-btn layui-btn-primary layui-btn-sm del"><i class="layui-icon"></i></button></div>\n'+
                '                            <i class="iconfont icon-huaban bt"></i>\n' +
                '                        </div>\n' +
                '                    </div>'+
                '<div class="layui-form-item">\n' +
                '                        <div class="layui-input-block">\n' +
                '                            <label class="layui-form-label">商品售价</label>\n' +
                '                            <div class="layui-inline">\n' +
                '                                <input type="text" name="spaces[]" lay-verify="required" class="layui-input">\n' +
                '                            </div>\n' +
                '                            <i class="iconfont icon-huaban bt"></i>\n' +
                '                        </div>\n' +
                '                    </div>'+
                '<div class="layui-form-item">\n' +
                '                        <div class="layui-input-block">\n' +
                '                            <label class="layui-form-label">商品划线价</label>\n' +
                '                            <div class="layui-inline">\n' +
                '                                <input type="text" name="space[]" lay-verify="required" value="" class="layui-input price">\n' +
                '                            </div>\n' +
                '                            <i class="iconfont icon-huaban bt"></i>\n' +
                '                        </div>\n' +
                '                    </div>'+
                '<div class="layui-form-item">\n' +
                '                        <div class="layui-input-block">\n' +
                '                            <label class="layui-form-label">库存</label>\n' +
                '                            <div class="layui-inline">\n' +
                '                                <input type="text" lay-verify="required" name="specStock[]" value="" class="layui-input specStock">\n' +
                '                            </div>\n' +
                '                            <i class="iconfont icon-huaban bt"></i>\n' +
                '                        </div>\n' +
                '                    </div>'+
                '<div class="layui-input-block">\n' +
                '                                                    <label class="layui-form-label">商品图片</label>\n' +
                '                                                    <i class="iconfont icon-huaban bt"></i>\n' +
                '                                                    <div class="layui-upload">\n' +
                '                                                        <button type="button" class="layui-btn test1" >上传图片</button>\n' +
                '                                                        <div class="layui-upload-list">\n' +
                '                                                            <img class="layui-upload-img" id="demo1">\n' +
                '                                                            <p id="demoText"></p>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                            </div>'+
                '<div class="layui-form-item ">\n' +
                '                            <div class="layui-input-block inputs">\n' +
                '                                <label class="layui-form-label">商品属性</label>\n' +
                '                                <div class="layui-inline cass"><div class="layui-inline">\n';

            if(catId.length == 0)
            {

                str+= '<p>请选择分类</p>';
            }
            else
            {
                str+='<select name="spac[]" class="select" lay-verify="required" lay-filter="shuxing" lay-reqtext="请选择">\n' +
                    '                                        <option value="">请选择</option>\n'+
                    catId+
                    '                                    </select>\n';
            }

            str+='                                </div></div>\n' +
                '                                <i class="iconfont icon-huaban bt"></i>\n' +
                '                            </div>\n' +
                '                        </div>'+
                '<hr>'+
                '</div>';

            return str;
        }
        function slik(catId) {
            var str = '<div id="came">';
               str += slicks(catId);
               str+= '</div>';
            return str;
        }
	</script>
</html>