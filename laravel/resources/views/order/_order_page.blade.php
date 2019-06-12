@if($code == 1002)
    <tr >
        <td colspan="6" align="center">抱歉没有数据了！</td>
    </tr>
@else
    @foreach($html as $val)
    <tr>
        <td>{{ $val->orderNo }}</td>
        <td>{{ $val->userName }}</td>
        <td>{{ $val->realTotalMoney }}</td>
        <td>
            @if($val->payType == 0)
                货到付款
             @else
                在线支付
             @endif
        </td>
        <td>@if($val->deliverType == 0)
                送货上门
            @else
                自提
            @endif
        </td>
        <td>
            @if($val->payFrom == 0)
                支付宝
            @else
                微信
            @endif
        </td>
        <td>{{ $val->createTime }}</td>
        <td>@if($val->isClosed == 0)
                未完结
            @else
                已完结
            @endif
        </td>
        <td>
            <button class="layui-btn layui-btn-xs" onclick="updateBut()">查看</button>

        </td>
    </tr>
    @endforeach
@endif