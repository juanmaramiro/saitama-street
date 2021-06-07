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

Auth::routes();

## All people routes ##
Route::get('/', 'HomeController@index')->name('getIndex');
Route::get('catalogue/{name}', 'HomeController@getCatalogue')->name('getCatalogue');
Route::get('collection/{category}', 'HomeController@getCollection')->name('getCollection');
Route::get('product/{id}', 'ProductController@show')->name('products.show');

## Auth users routes ##
Route::group(['middleware' => ['web', 'auth']], function(){

	### Users routes ###
	Route::get('perfil', 'HomeController@home')->name('home');
	Route::get('contacto', 'HomeController@contact')->name('contact');
	
		## Cart routes
		Route::post('product/store', 'CartController@store')->name('cart.store');
		Route::get('carrito', 'CartController@index')->name('cart');
		Route::get('carrito/delete_{id}', 'CartController@delete')->name('cart.delete');
		Route::post('carrito/update', 'CartController@update')->name('cart.update');
		Route::post('checkout', 'CartController@checkout')->name('checkout');
		Route::post('checkCoupon', 'CartController@checkCoupon')->name('check.coupon');
		Route::get('endcart', 'CartController@endCart')->name('endCart');

		## User panel routes
		Route::post('updateAvatar','HomeController@changeAvatar')->name('update.avatar');
		Route::post('updateEmail','HomeController@changeEmail')->name('update.email');
		Route::post('updatePassword','HomeController@changePassword')->name('update.password');

	### Admin routes ###
	Route::get('admin', 'AdminController@index')->name('admin');

		## Users CRUD routes ##
		Route::get('admin/users', 'AdminController@listUsers')->name('getUsers');
		Route::get('admin/users/update/{id}', 'AdminController@changePrivileges')->name('users.update');

		## Categories CRUD routes ##
		Route::get('admin/categories', 'CategoryController@index')->name('getCategories');
		Route::get('admin/categories/addCategory', 'CategoryController@add')->name('categories.add');
		Route::post('admin/categories/store', 'CategoryController@store')->name('categories.store');
		Route::get('admin/categories/editCategory_{id}', 'CategoryController@edit')->name('categories.edit');
		Route::post('admin/categories/update/{id}', 'CategoryController@update')->name('categories.update');
		Route::get('admin/categories/delete_{id}', 'CategoryController@delete')->name('categories.delete');

		## Coupons CRUD routes ##
		Route::get('admin/coupons', 'CouponController@index')->name('getCoupons');
		Route::get('admin/coupons/addCoupon', 'CouponController@add')->name('coupons.add');
		Route::post('admin/coupons/store', 'CouponController@store')->name('coupons.store');
		Route::get('admin/coupons/editCoupon_{id}', 'CouponController@edit')->name('coupons.edit');
		Route::post('admin/coupons/update/{id}', 'CouponController@update')->name('coupons.update');
		Route::get('admin/coupons/delete_{id}', 'CouponController@delete')->name('coupons.delete');

		## Products CRUD routes ##
		Route::get('admin/products', 'ProductController@index')->name('getProducts');
		Route::get('admin/products/addProduct', 'ProductController@add')->name('products.add');
		Route::post('admin/products/store', 'ProductController@store')->name('products.store');
		Route::get('admin/products/editProduct_{id}', 'ProductController@edit')->name('products.edit');
		Route::post('admin/products/update/{id}', 'ProductController@update')->name('products.update');		
		Route::get('admin/products/delete_{id}', 'ProductController@delete')->name('products.delete');	
});
