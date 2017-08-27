<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


//login
Route::get('/', function () {
  return view('auth/login');
});

Auth::routes();

Route::get('/users/beranda_lelang', 'HomeController@index');

Route::group(['middleware'=>['web','auth']], function(){
  // Route::resource('admin/crud_lelang', 'UploadLelang');

  // Route::resource('/admin/user_members', 'ProsesCrud');

  // Route::resource('/admin/members', 'DataAdmin');

  // Route::get('/admin/show_comment', 'Komentar@tampilData');
  // Route::get('/admin/list_auction', 'UploadLelang@index');


//USER
  Route::resource('/users/beranda_lelang', 'ShowLelang');
  Route::resource('/users/profil_user', 'EditPerusahaan');
  Route::resource('/users/pesan_user', 'PesanUser');
  // Route::get('/users/auction_stats', 'StatusLelang@show');
  Route::get('/users/about', function () {
   return view('user/about');
 });
  Route::get('/users/requirement', function () {
   return view('user/require');
 });
  Route::get('/users/step_auction', function () {
   return view('user/step');
 });
  Route::get('/users/help', function () {
   return view('user/help');
 });

  Route::get('/admin', function(){


    if (Auth::user()->level=='Admin'){
      return redirect()->route('user_members.index');
    }
    else if(Auth::user()->level=='User'){
      return redirect()->route('beranda_lelang.index');
    }
  });

});


Auth::routes();
Route::get('register/verify/{token}','Auth\RegisterController@verify');
Route::get('/home', 'HomeController@index');
Route::group(['middleware'=>['App\Http\Middleware\SessionUser']], function(){

  Route::resource('/admin/crud_lelang', 'UploadLelang');
  Route::get('/admin/auction', 'UploadLelang@index');
  Route::get('/admin/auction/edit/{id}', 'UploadLelang@edit');
  Route::get('/admin/auction/data', 'UploadLelang@data');
  Route::post('/admin/auction/destroy/{idlelang}', 'UploadLelang@destroy');
  Route::get('/admin/auctioneers/show/{idlelang}', 'UploadLelang@show');

  Route::resource('/admin/kelola_pesan', 'KelolaPesan');

  Route::resource('/admin/user_members', 'CrudUser');
  Route::get('/admin/user_members/edit/{id}', 'CrudUser@edit');
  Route::get('/admin/users', 'CrudUser@index');
  Route::get('/admin/users/data', 'CrudUser@data');
  Route::post('/admin/users/destroy/{id}', 'CrudUser@destroy');
  // Route::resource('/admin/penawaran', 'AdminShowNego');
  // Route::get('/admin/user_members/edit/', 'CrudUser@edit');

  Route::resource('/admin/members', 'DataAdmin');

  Route::resource('/admin/auctioneers/', 'AdminShowNego');
  // Route::post('/admin/auctioneers/kirim-pesan/{id}', 'AdminShowNego@kirimPesan');


});
