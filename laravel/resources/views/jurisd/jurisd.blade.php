<style>
    /*权限*/
    .dl_box{border-bottom:1px solid #CCC; overflow:hidden; margin:0; padding:0; width:100% }
    .dl_box dt{ width:20%;line-height:30px; float:left; padding-left:10px; }
    .dl_box dd{width:80%; float:left;border-left:1px solid #ccc;padding-left:10px;}
    .dl_box dd span{ float:left; width:115px; height:30px; line-height:30px; display:inline-block;font-size: 12px}
</style>

    <link rel="stylesheet" href="css/main.css">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-6">
                        <form>
                            <div class="form-group">
                                <label for="exampleSelectRole">选择角色</label>
                                <select class="form-control" id="exampleSelectRole">
                                    <option value="">请选择</option>
                                    <!--{foreach $roles as $val}-->
                                    <!--<option value="{$val.id}">{$val.role_name}</option>-->
                                    <!--{/foreach}-->
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <form action="javascript:void(0)" id="auth-form">
                            <div class="form-group">
                                <label for="exampleSelect1">选择权限</label>
                                <!--{foreach $auths as $val}-->
                                <dl class="dl_box" id="exampleSelect1">
                                    <dt>
                                        <label>
                                            <div class="animated-checkbox auth-p">
                                                <label>
                                                    <input type="checkbox" value="" name="node_p" class="auths"><span class="label-text">父权限</span>
                                                </label>
                                            </div>
                                        </label>
                                    </dt>
                                    <dd>
                                        <!--{foreach $val.children as $val2}-->
                                        <span><label>
                                            <div class="animated-checkbox auth-c">
                                                <label>
                                                    <input type="checkbox" value="" name="node_c" class="auths"><span class="label-text">测试权限1</span>
                                                </label>
                                            </div>
                                        </label></span>
                                        <span><label>
                                            <div class="animated-checkbox auth-c">
                                                <label>
                                                    <input type="checkbox" value="" name="node_c" class="auths"><span class="label-text">测试权限1</span>
                                                </label>
                                            </div>
                                        </label></span>
                                        <span><label>
                                            <div class="animated-checkbox auth-c">
                                                <label>
                                                    <input type="checkbox" value="" name="node_c" class="auths"><span class="label-text">测试权限1</span>
                                                </label>
                                            </div>
                                        </label></span>
                                        <!--{/foreach}-->
                                    </dd>
                                </dl>
                                <!--{/foreach}-->
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit" id="put-auth-btn">保存</button>
                                <span style="color: red;" id="put-auth-message"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


