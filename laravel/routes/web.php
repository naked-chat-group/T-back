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
Route::get('CommodManagement', 'CommodController@index');
Route::get('CommodManagementAdd', 'CommodController@add');

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