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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function(){
    return view('puskesmas.index');
})->name('home');


Route::get('/sendemail/{email}/{token}/{nama}', 'UserController@sendEmailVerification2')->name('user.send');
Route::get('/verification/{email}/{token}', 'UserController@verification');

Route::get('data', 'HomeController@lihatdata')->name('puskesmas.lihatdata');
Route::get('data/{id}/dataprogram', 'HomeController@listprogram')->name('puskesmas.listprogram');
Route::get('data/{id}/{nama}', 'HomeController@dataprogram')->name('puskesmas.data');
Route::get('data/{id}/{nama}/{indi}', 'HomeController@chart')->name('puskesmas.data.chart');

Route::get('/dashboard/data/input/skdn/skdn', 'SkdnController@inputSkdn')->name('skdn.input');

Route::resource('dashboard/program','ProgramController');
Route::resource('dashboard/indikator','IndikatorController');
Route::resource('dashboard/puskesmas', 'PuskesmasController');

Route::get('/dashboard', 'UserController@index')->name('dashboard.index');
Route::get('/dashboard/create', 'UserController@create')->name('dashboard.create');
Route::get('/dashboard/deleteuser/{id}', 'UserController@destroy');
Route::get('/dashboard/edituser/{id}', 'UserController@edit');
Route::get('/dashboard/datauser', 'UserController@datauser')->name('datauser');
Route::post('/dashboard/store', 'UserController@store')->name('dashboard.store');
Route::put('/dashboard/update/{id}', 'UserController@update')->name('dashboard.update');

Route::get('dashboard/savedata', 'UserController@savedata')->name('user.savedata');
Route::get('dashboard/savedata/datatahun', 'UserController@datatahun2')->name('user.save.datatahun2');
Route::get('dashboard/savedata/datatahun/print', 'UserController@savedatatahun')->name('user.save.data');

Route::get('dashboard/data/input/{program}', 'DataController@tambahdata')->name('data.tambah');
Route::get('dashboard/data/input', 'DataController@dataprograminput')->name('data.input');
Route::post('dashboard/data/fetch', 'DataController@fetch')->name('data.fetch');

Route::get('dashboard/program/{id}/delete', 'ProgramController@destroy');
Route::get('dashboard/indikator/{id}/delete', 'IndikatorController@destroy');
Route::get('dashboard/target/{id}/delete', 'TargetController@destroy');
Route::get('dashboard/target/{id}/editdata', 'TargetController@edit')->name('target.edit1');
Route::post('dashboard/target/fetch', 'TargetController@fetch')->name('target.fetch');
Route::get('dashboard/puskesmas/{id}/delete', 'PuskesmasController@destroy');

Route::get('dashboard/data/{id}/dataprogram', 'DataController@dataprog')->name('data.dataprog');
Route::get('dashboard/data/{id}/{nama}', 'DataController@data')->name('data.data');
Route::get('dashboard/data/{id}/{nama}/{indi}', 'DataController@chart')->name('data.indi.chart');

Route::get('dashboard/chartdata', 'DataController@chartdata')->name('data.chartdata');
Route::get('dashboard/chartdata/{id}', 'DataController@chartdataprogram')->name('data.chartdataprogram');
Route::get('dashboard/chartdata/{id}/{nama}', 'DataController@chartdatatahun')->name('data.chartdatatahun');
Route::get('dashboard/chartdata/{id}/{nama}/{tahun}', 'DataController@showchart')->name('data.showchart');

Route::get('dashboard/laporan', 'DataController@laporan')->name('data.laporan');
Route::get('dashboard/laporan/{id}', 'DataController@laporandatatahun')->name('laporan.datatahun');
Route::get('dashboard/laporan/{id}/{tahun}', 'DataController@cetaklaporan')->name('laporan.cetak');
Route::get('dashboard/laporan/{id}/{tahun}/simpan', 'DataController@simpanlaporan')->name('laporan.simpan');
//contoh pakai post
Route::post('dashboard/data/chart', 'DataController@chart2')->name('data.indi.chart2');

Route::get('dashboard/{id}/{nama}/edit', 'DataController@edit')->name('data.edit2');

// Route::get('kadarzi/delete/{id}', 'KadarziController@destroy');

Route::get('dashboard/notif/skdn', 'NotifController@notifskdn')->name('notif-skdn');
Route::get('dashboard/notif/{id}', 'NotifController@notif')->name('notif');
Route::resource('dashboard/program/skdn', 'SkdnController');

Route::resource('dashboard/target','TargetController');
Route::resource('dashboard/data', 'DataController');

// Route::resource('dashboard', 'UserController');