
@if($code == 1002)
    <tr >
        <td colspan="6" align="center">抱歉没有数据了！</td>
    </tr>
@else

    @foreach($html as $val)
        <tr>
            <td>{{ $val->catName }}</td>
            <td>{{ $val->simpleName }}</td>
            <td></td>

            <td>
                  <div class="layui-form-item" >

            <div class="layui-input-block" id="test">
                <input type="checkbox"  name="switch" lay-skin="switch" lay-text="启用|关闭" id="Isuse" value="否" checked>
            </div>
        </div>                                                      

            </td>

            <td>{{ $val->catSort }}</td>
            <td>
                <button type="button" class="layui-btn">
                    <i class="layui-icon">&#xe608;</i> 添加二级分类
                </button>
                <a href="CatsUpd?catId={{ $val->catId }}">
                    <button type="button" class="layui-btn">
                        <i class="layui-icon layui-icon-edit">&#xe642;</i>
                    </button></a>
                <button type="button" class="layui-btn delete" id="{{  $val->catId }}">
                    <i class="layui-icon layui-icon-delete" ></i>
                </button>
            </td>
        </tr>
    @endforeach
@endif







	



