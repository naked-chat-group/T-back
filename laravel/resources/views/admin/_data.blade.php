@foreach ($admin as $val)
    <tr>
        <td><input type="checkbox" value="{{ $val['id'] }}" class="checkbox"></td>
        <td>{{ $val['admin_name'] }}</td>
        <td>
            @if ($val['roles'] != null)
                {{ $val['roles']['name'] }}
            @else
                超级管理员
            @endif
        </td>
        <td>{{ $val['email'] }}</td>
        <td>{{ $val['last_time'] }}</td>
        <td>
            <a href="/AdminEdit?id={{ $val['id'] }}"><button class="layui-btn layui-btn-xs upd">修改</button></a>
            <button class="layui-btn layui-btn-xs">删除</button>
        </td>
    </tr>
@endforeach