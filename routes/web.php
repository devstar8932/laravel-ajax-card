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
//Frontend site
Route::get('/', 'HomeController@index');







//Backend routes
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/login', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//users routes are here
Route::get('/add-user', 'UserController@index');
Route::post('/save-user', 'UserController@save_user');
Route::get('/all-user', 'UserController@all_user');
Route::get('/edit-user/{user_id}', 'UserController@edit_user');
Route::post('/update-user/{user_id}', 'UserController@update_user');
Route::get('/delete-user/{user_id}', 'UserController@delete_user');
Route::get('/unactive_user/{user_id}', 'UserController@unactive_user');
Route::get('/active_user/{user_id}', 'UserController@active_user');

//card routes are here
Route::get('/add-card', 'CardController@index');
Route::post('/save-card', 'CardController@save_card');
Route::get('/all-card', 'CardController@all_card');
Route::get('/edit-card/{user_id}', 'CardController@edit_card');
Route::post('/update-card/{user_id}', 'CardController@update_card');
Route::get('/delete-card/{user_id}', 'CardController@delete_card');
Route::get('/unactive_card/{user_id}', 'CardController@unactive_card');
Route::get('/active_card/{user_id}', 'CardController@active_card');

//add star routes are here
Route::post('/add-star','StarController@add_star');
// Route::post('/add-star',function(){
//     echo 123;exit;
// });