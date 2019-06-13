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
Route::any('/', 'LoginController@index');
Route::any('login', 'LoginController@login');
Route::any('verityToken','LoginController@verityToken');
//修改密码
Route::any('update','LoginController@update');
//退出登录
Route::any('layout','StaticController@layout');

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
//Route::get('RoleManagement', 'ManageController@index');
//Route::get('RoleManagementAdd', 'ManageController@add');
//
////管理员管理
//Route::get('AdminManagement', 'AdminController@index');
//Route::get('AdminManagementAdd', 'AdminController@add');

//商品分类管理
Route::get('ClassManagement', 'ClassController@index');
//商品分页
Route::get('CatsPage', 'ClassController@page');
//商品添加页面
Route::get('ClassManagementAdd', 'ClassController@add');
//分类添加
Route::post('CatsAdd','ClassController@CatsAdd');
//分类楼层状态修改
Route::post('CatstypeUpd','ClassController@CatstypeUpd');
//分类删除
Route::post('CatsDel','ClassController@CatsDel');
//分类修改
Route::any('CatsUpd','ClassController@CatsUpd');

//品牌管理
Route::get('BrandManagement', 'BrandController@index');
Route::get('BrandManagementAdd', 'BrandController@add');
Route::get('BrandManagementList', 'BrandController@lists');

//订单管理
Route::get('OrderManagement', 'OrderController@index');
    //订单分页
    Route::get('orderPage','OrderController@page');

Route::get('OrderManagementList', 'OrderController@list');
Route::get('OrderManagementUpdate', 'OrderController@update');

//商品属性管理
Route::get('CommodManagement', 'CommodController@index');
Route::get('CommodManagementAdd', 'CommodController@add');
Route::post('CommodManagementTwo', 'CommodController@two');

//商品管理
Route::get('ShopManagement', 'ShopController@index');
Route::get('ShopManagementAdd', 'ShopController@add');

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
Route::get('Call_centerManagementChange','Call_centerController@change');
Route::get('OpinionManagement','Call_centerController@opinion');