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
Route::get('ClassManagementAdd', 'ClassController@add');

//品牌管理
Route::get('BrandManagement', 'BrandController@index');
Route::get('BrandManagementAdd', 'BrandController@add');
Route::get('BrandManagementList', 'BrandController@lists');

//订单管理
Route::get('OrderManagement', 'OrderController@index');
Route::get('OrderManagementUpdate', 'OrderController@update');

//商品属性管理
Route::any('CommodManagement', 'CommodController@index');
Route::any('CommodManagementAdd', 'CommodController@add');
Route::post('CommodManagementTwo', 'CommodController@two');
Route::get('CommodManagementDel', 'CommodController@del');//删除
Route::post('CommodManagementUpdshow', 'CommodController@upshow');//修改显示
Route::post('CommodManagementUpdflag', 'CommodController@flag');//修改有效
Route::get('CommodManagementInputs', 'CommodController@inputs');//分页
Route::get('CommodManagementUpdate/{id}', 'CommodController@update');
Route::post('CommodManagementUpdates', 'CommodController@updates');//修改
Route::get('CommodManagementUpdateShu/{id}', 'CommodController@updatesShu');//修改属性值
Route::post('CommodManagementUpdateShus', 'CommodController@updatesShus');//修改属性值


Route::any('ShopManagementSku', 'SkuController@index');//修改属性值
Route::get('ShopManagementType', 'SkuController@type');//修改属性值


//商品管理
Route::post('ShopManagementTwo', 'ShopController@two');
Route::get('ShopManagement', 'ShopController@index');
Route::get('ShopManagementAdd', 'ShopController@add');
Route::get('ShopManagementBrand/{id}', 'ShopController@brand');//所属品牌
Route::post('ShopManagementUpload', 'ShopController@upload');//文件上传
Route::post('ShopManagementValue', 'ShopController@value');//文件上传
Route::post('ShopManagementInputs', 'ShopController@inputs');//文件上传
Route::get('ShopManagementView', 'ShopController@view');//文件上传
Route::get('ShopManagementDel', 'ShopController@del');//文件上传
Route::any('ShopManagementUpdate/{id}', 'ShopController@update');
Route::get('ShopManagementUpdates', 'ShopController@updates');
Route::post('ShopManagementUpdateSpec', 'ShopController@spec');


//权限管理
Route::get('JurisdManagement', 'JurisdController@index');