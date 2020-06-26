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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/Home', function (){
//         return view('adminHome');  
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('is_user');

Route::get('/produk', 'HomeController@produkuser')->middleware('is_user')->name('produkuser');

Route::get('/produk/cari', 'HomeController@cari')->middleware('is_user')->name('cari');

Route::get('/cart/', 'HomeController@cart')->middleware('is_user');

Route::get('/cart/{id}', 'HomeController@cartproses')->middleware('is_user');

Route::get('/checkout', 'HomeController@checkout')->middleware('is_user');

Route::post('/berhasil', 'HomeController@berhasil')->middleware('is_user');

Route::get('/pembayaran/berhasil', 'HomeController@sukses')->middleware('is_user');

Route::get('confirm', 'HomeController@confirm');

Route::patch('update-cart', 'HomeController@update');
 
Route::delete('remove-from-cart', 'HomeController@remove');

Route::get('/ganti-katasandi', 'HomeController@katasandi')->middleware('is_user');

Route::post('/ganti-katasandi/proses', 'HomeController@sandiproses')->name('change.user')->middleware('is_user');

Route::get('/pengaturan/{id}', 'HomeController@pengaturanuser');

Route::put('/pengaturan/update/{id}', 'HomeController@pengaturanupdate');



// admin

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::get('admin/produk', 'HomeController@produk')->middleware('is_admin'); 

Route::get('admin/produk/tambah', 'HomeController@tambah')->middleware('is_admin');

Route::post('admin/produk/tambah/proses', 'HomeController@proses')->middleware('is_admin');

Route::get('admin/produk/edit/{id}', 'HomeController@edit')->middleware('is_admin');

Route::get('admin/produk/hapus/{id}', 'HomeController@hapus')->middleware('is_admin');

Route::put('admin/produk/update/{id}', 'HomeController@updategambar')->middleware('is_admin');

Route::get('admin/pengaturan','HomeController@pengaturan')->middleware('is_admin');

Route::post('/admin/pengaturan/change-password', 'HomeController@change')->name('change.password')->middleware('is_admin');


Route::get('/menu', function () {
    return view('dmenu');
});

Route::get('/jadwal', function (){
    return view('jadwal');
});

