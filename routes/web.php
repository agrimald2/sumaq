<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');


/***Category***/
Route::get('/category',function(){
	$name_view = 'CATEGORIA';
	return view('master_tables.mae_category', compact('name_view'));
})->name('category');

Route::get('get_categories', 'CategoryController@GetCategories');
Route::post('post_categories', 'CategoryController@PostCategories');


/***Colletion***/
Route::get('/collection',function(){
	$name_view = 'COLECCIÓN';
	return view('master_tables.mae_collections', compact('name_view'));
})->name('collection');

Route::get('get_collection', 'CollectionsController@GetCollections');
Route::post('post_collection', 'CollectionsController@PostCollections');

/***Discounts***/
Route::get('/discount',function(){
	$name_view = 'DESCUENTOS';
	return view('master_tables.mae_discounts', compact('name_view'));
})->name('discount');

Route::get('get_discount', 'DiscountController@GetDiscounts');
Route::post('post_discount', 'DiscountController@PostDiscounts');


/***Materials***/
Route::get('/material',function(){
	$name_view = 'MATERIAL';
	return view('master_tables.mae_materials', compact('name_view'));
})->name('material');

Route::get('get_material', 'MaterialController@GetMaterials');
Route::post('post_material', 'MaterialController@PostMaterials');

/***Sucursals***/
Route::get('/sucursal',function(){
	$name_view = 'SUCURSAL';
	return view('master_tables.mae_sucursals', compact('name_view'));
})->name('sucursal');

Route::get('get_sucursal', 'SucursalController@GetSucursals');
Route::post('post_sucursal', 'SucursalController@PostSucursals');


/***Providers***/
Route::get('/provider',function(){
	$name_view = 'PROVEEDOR';
	return view('master_tables.mae_providers', compact('name_view'));
})->name('provider');


Route::get('get_provider', 'ProviderController@GetProvider');
Route::post('post_provider', 'ProviderController@PostProvider');


/***Products***/
Route::get('/products',function(){
	$name_view = 'PRODUCTOS';
	return view('processes_tables.tbl_products', compact('name_view'));
})->name('products');


Route::get('get_products', 'ProductsController@GetProducts');
Route::post('post_products', 'ProductsController@PostProducts');
Route::get('/generate_qr/{id}', 'ProductsController@GenerateQR');



/***Sales***/
Route::get('/sales/pedidos','SalesController@index')->name('/sales/pedidos');


/**PurcheaseOrders**/
Route::get('/search_producto/{products_name}', 'ControllerPurchase_Orders@SearchProducto');
Route::get('/search_proveedor/{providers_name}', 'ControllerPurchase_Orders@SearchProveedor');
Route::post('/post_order', 'ControllerPurchase_Orders@CreateListOrder');