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
Route::get('/index', 'StaticController@index');

//登录
Route::get('/', 'LoginController@index');

//首页
Route::get('show', 'IndexController@index');

//管理员列表页面
Route::get('AdminManagement', 'AdminController@index');
//管理员数据页面
Route::get('getData', 'AdminController@getData');
//管理员添加页面
Route::get('AdminAdd', 'AdminController@addAdmin');
//管理员的添加方法
Route::post('AdminStore', 'AdminController@AdminStore');
//管理员修改页面
Route::get('AdminEdit', 'AdminController@AdminEdit');
Route::post('AdminEdit', 'AdminController@AdminUpd');
//权限列表页面
Route::get('AuthManagement', 'AuthController@index');
//权限数据页面
Route::get('AuthData', 'AuthController@getData');
//权限添加页面
Route::get('AuthAdd', 'AuthController@addAuth');
//获取控制器所拥有的方法
Route::get('getAction', 'AuthController@getAction');
//权限添加方法
Route::post('AuthStore', 'AuthController@AuthStore');
//菜单生成页面
Route::get('MenuCreate', 'AuthController@MenuCreate');
//添加菜单
Route::post('MenuStore', 'AuthController@MenuStore');

//角色页面
Route::get('RoleManagement', 'RoleController@index');
//角色数据
Route::get('RoleData', 'RoleController@RoleData');
//添加角色
Route::get('RoleCreate', 'RoleController@RoleCreate');
//执行添加角色
Route::post('RoleStore', 'RoleController@RoleStore');
//修改角色信息
Route::get('RoleEdit', 'RoleController@RoleEdit');
Route::post('RoleEdit', 'RoleController@RoleUpd');
//Route::get('RoleManagement', 'ManageController@index');
//Route::get('RoleManagementAdd', 'ManageController@add');


//商品分类管理
Route::get('ClassManagement', 'ClassController@index');
Route::get('ClassManagementAdd', 'ClassController@add');

//品牌管理
Route::get('BrandManagement', 'BrandController@index');
Route::get('BrandManagementAdd', 'BrandController@add');
Route::get('BrandManagementList', 'BrandController@lists');

//订单管理
Route::get('OrderManagement', 'OrderController@index');
Route::get('OrderManagementUpdate', 'OrderController@update');

//商品属性管理
Route::get('CommodManagement', 'CommodController@index');
Route::get('CommodManagementAdd', 'CommodController@add');

//商品管理
Route::get('ShopManagement', 'ShopController@index');
Route::get('ShopManagementAdd', 'ShopController@add');

//权限管理
Route::get('JurisdManagement', 'JurisdController@index');