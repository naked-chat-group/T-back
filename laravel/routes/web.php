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

//管理员角色管理
Route::get('RoleManagement', 'ManageController@index');
Route::get('RoleManagementAdd', 'ManageController@add');

//管理员管理
Route::get('AdminManagement', 'AdminController@index');
Route::get('AdminManagementAdd', 'AdminController@add');

//商品分类管理
Route::get('ClassManagement', 'ClassController@index');
    //商品分页
    Route::get('CatsPage', 'ClassController@page');
Route::get('ClassManagementAdd', 'ClassController@add');
//分类添加
Route::post('CatsAdd','ClassController@CatsAdd');

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

//商品管理
Route::get('ShopManagement', 'ShopController@index');
Route::get('ShopManagementAdd', 'ShopController@add');

//权限管理
Route::get('JurisdManagement', 'JurisdController@index');