<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//左侧菜单栏
Route::get('/index', 'StaticController@index')->name('StaticController@index');

//登录
Route::any('/', 'LoginController@index')->name('LoginController@index');
Route::any('login', 'LoginController@login')->name('LoginController@login');
Route::any('verityToken','LoginController@verityToken')->name('LoginController@verityToken');
//修改密码
Route::any('update','LoginController@update')->name('LoginController@update');
//退出登录
Route::any('layout','StaticController@layout')->name('StaticController@layout');

//首页
Route::get('show', 'IndexController@index')->name('IndexController@index');

//管理员列表页面
Route::get('AdminManagement', 'AdminController@index')->name('AdminController@index');
//管理员数据页面
Route::get('getData', 'AdminController@getData')->name('AdminController@getData');
//管理员添加页面
Route::get('AdminAdd', 'AdminController@addAdmin')->name('AdminController@addAdmin');
//管理员的添加方法
Route::post('AdminStore', 'AdminController@AdminStore')->name('AdminController@AdminStore');
//管理员修改页面
Route::get('AdminEdit', 'AdminController@AdminEdit')->name('AdminController@AdminEdit');
Route::post('AdminEdit', 'AdminController@AdminUpd')->name('AdminController@AdminUpd');
//权限列表页面
Route::get('AuthManagement', 'AuthController@index')->name('AuthController@index');
//权限数据页面
Route::get('AuthData', 'AuthController@getData')->name('AuthController@getData');
//权限添加页面
Route::get('AuthAdd', 'AuthController@addAuth')->name('AuthController@addAuth');
//获取控制器所拥有的方法
Route::get('getAction', 'AuthController@getAction')->name('AuthController@getAction');
//权限添加方法
Route::post('AuthStore', 'AuthController@AuthStore')->name('AuthController@AuthStore');
//菜单生成页面
Route::get('MenuCreate', 'AuthController@MenuCreate')->name('AuthController@MenuCreate');
//添加菜单
Route::post('MenuStore', 'AuthController@MenuStore')->name('AuthController@MenuStore');

//角色页面
Route::get('RoleManagement', 'RoleController@index')->name('RoleController@index');
//角色数据
Route::get('RoleData', 'RoleController@RoleData')->name('RoleController@RoleData');
//添加角色
Route::get('RoleCreate', 'RoleController@RoleCreate')->name('RoleController@RoleCreate');
//执行添加角色
Route::post('RoleStore', 'RoleController@RoleStore')->name('RoleController@RoleStore');
//修改角色信息
Route::get('RoleEdit', 'RoleController@RoleEdit')->name('RoleController@RoleEdit');
Route::post('RoleEdit', 'RoleController@RoleUpd')->name('RoleController@RoleUpd');
//Route::get('RoleManagement', 'ManageController@index');
//Route::get('RoleManagementAdd', 'ManageController@add');


//商品分类管理
Route::get('ClassManagement', 'ClassController@index')->name('ClassController@index');
//商品分页
Route::get('CatsPage', 'ClassController@page')->name('ClassController@page');
//商品添加页面
Route::get('ClassManagementAdd', 'ClassController@add')->name('ClassController@add');
//分类添加
Route::post('CatsAdd','ClassController@CatsAdd')->name('ClassController@CatsAdd');
//分类楼层状态修改
Route::post('CatstypeUpd','ClassController@CatstypeUpd')->name('ClassController@CatstypeUpd');
//分类删除
Route::post('CatsDel','ClassController@CatsDel')->name('ClassController@CatsDel');
//分类修改
Route::any('CatsUpd','ClassController@CatsUpd')->name('ClassController@CatsUpd');

//品牌管理列表
Route::get('BrandManagementList', 'BrandController@lists')->name('BrandController@lists');
//品牌添加
Route::get('BrandManagementAdd', 'BrandController@add')->name('BrandController@add');
//品牌添加方法
Route::post('BrandManagementAdds', 'BrandController@adds')->name('BrandController@adds');
//品牌删除
Route::post('BrandManagementDel', 'BrandController@Del')->name('BrandController@Del');
//品牌分页数据
Route::get('BrandManagementPages','BrandController@BrandsPage')->name('BrandController@BrandsPage');
//修改页面
Route::get('BrandManagementUpd','BrandController@BrandsUpd')->name('BrandController@BrandsUpd');
//品牌修改
Route::post('BrandManagementUpds','BrandController@BrandsUpds')->name('BrandController@BrandsUpds');
//品牌图片添加接口
Route::post('BrandManagementUpload', 'BrandController@Upload')->name('BrandController@Upload');
//品牌搜索
Route::post('BrandManagementSel', 'BrandController@Sel')->name('BrandController@Sel');


//订单管理
Route::get('OrderManagement', 'OrderController@index')->name('OrderController@index');
//订单详情
Route::get('OrderManagementDesc', 'OrderController@desc')->name('OrderController@desc');
//订单分页
Route::get('orderPage','OrderController@page')->name('OrderController@page');
//订单修改
Route::get('orderUpdate','OrderController@update')->name('OrderController@update');
//订单商品修改OrdergoodSel
Route::get('ordergoodSel','OrderController@OrdergoodSel')->name('OrderController@OrdergoodSel');

Route::get('OrderManagementList', 'OrderController@list');

Route::get('OrderManagementUpdate', 'OrderController@update');

//商品属性管理
Route::any('CommodManagement', 'CommodController@index')->name('CommodController@index');
Route::any('CommodManagementAdd', 'CommodController@add')->name('CommodController@add');
Route::post('CommodManagementTwo', 'CommodController@two')->name('CommodController@two');
Route::get('CommodManagementDel', 'CommodController@del')->name('CommodController@del');//删除
Route::post('CommodManagementUpdshow', 'CommodController@upshow')->name('CommodController@upshow');//修改显示
Route::post('CommodManagementUpdflag', 'CommodController@flag')->name('CommodController@flag');//修改有效
Route::get('CommodManagementInputs', 'CommodController@inputs')->name('CommodController@inputs');//分页
Route::get('CommodManagementUpdate/{id}', 'CommodController@update')->name('CommodController@update');
Route::post('CommodManagementUpdates', 'CommodController@updates')->name('CommodController@updates');//修改
Route::get('CommodManagementUpdateShu/{id}', 'CommodController@updatesShu')->name('CommodController@updatesShu');//修改属性值
Route::post('CommodManagementUpdateShus', 'CommodController@updatesShus')->name('CommodController@updatesShus');//修改属性值


//商品管理
Route::get('ShopManagement', 'ShopController@index')->name('ShopController@index');
Route::get('ShopManagementAdd', 'ShopController@add')->name('ShopController@add');
Route::get('ShopManagementBrand/{id}', 'ShopController@brand')->name('ShopController@brand');//所属品牌
Route::post('ShopManagementUpload', 'ShopController@upload')->name('ShopController@upload');//文件上传
Route::post('ShopManagementValue', 'ShopController@value')->name('ShopController@value');//文件上传
Route::post('ShopManagementValues', 'ShopController@values')->name('ShopController@values');//文件上传


//权限管理
Route::get('JurisdManagement', 'JurisdController@index');

//仓库管理
Route::get('WarehouseManagement','WarehouseController@index');
Route::get('WarehouseManagementAdd','WarehouseController@add');
Route::get('WarehouseManagementCity','WarehouseController@city');
Route::get('WarehouseManagementInsert','WarehouseController@insert');
Route::get('WarehouseManagementChange','WarehouseController@change');
Route::get('WarehouseManagementUpdate','WarehouseController@update');
Route::get('WarehouseManagementUp','WarehouseController@up');
Route::get('WarehouseManagementDel','WarehouseController@del');
Route::get('WarehouseManagementSearch','WarehouseController@search');

//客服中心
Route::get('CommentManagement','Call_centerController@comment');
Route::get('CommentManagementChange','Call_centerController@change');
Route::get('CommentManagementReply','Call_centerController@reply');
Route::get('CommentManagementSearch','Call_centerController@search');
Route::get('OpinionManagement','Call_centerController@opinion');
Route::get('OpinionManagementReply','Call_centerController@opinion_reply');
Route::get('OpinionManagementSearch','Call_centerController@opinion_search');

//活动管理
Route::get('PromotionManagement','ActivityController@promotion');
Route::get('PromotionManagementAdd','ActivityController@promotionAdd');
Route::get('TicketManagement','ActivityController@ticket');
Route::get('TicketManagementAdd','ActivityController@ticketAdd');