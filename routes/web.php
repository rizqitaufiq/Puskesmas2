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

Route::get('/lihatdata', 'HomeController@lihatdata')->name('puskesmas.lihatdata');
Route::get('/{id}/listprogram', 'HomeController@listprogram')->name('puskesmas.listprogram');

Route::get('/listprogram/skdn', 'SkdnController@lihatdata')->name('listprogram.skdn');
Route::get('/listprogram/kadarzi', 'KadarziController@lihatdata')->name('listprogram.kadarzi');
Route::get('/listprogram/ttd', 'TtdController@lihatdata')->name('listprogram.ttd');
Route::get('/listprogram/pmt', 'PmtController@lihatdata')->name('listprogram.pmt');

Route::get('/listprogram/skdn/chart', 'SkdnController@chart')->name('user.skdn.chart');
Route::get('/listprogram/pmt/chart', 'PmtController@chart')->name('user.pmt.chart');
Route::get('/listprogram/kadarzi/chart', 'KadarziController@chart')->name('user.kadarzi.chart');
Route::get('/listprogram/ttd/chart', 'TtdController@chart')->name('user.ttd.chart');

Route::get('dashboard/kadarzi/chart', 'KadarziController@chart')->name('kadarzi.chart');
Route::get('dashboard/pmt/chart', 'PmtController@chart')->name('pmt.chart');
Route::get('dashboard/skdn/chart', 'SkdnController@chart')->name('skdn.chart');
Route::get('dashboard/ttd/chart', 'TtdController@chart')->name('ttd.chart');

Route::get('/dashboard/skdn/datapus', 'SkdnController@datapus')->name('skdn.datapus');
Route::get('/dashboard/pmt/datapus', 'PmtController@datapus')->name('pmt.datapus');
Route::get('/dashboard/kadarzi/datapus', 'KadarziController@datapus')->name('kadarzi.datapus');
Route::get('/dashboard/ttd/datapus', 'TtdController@datapus')->name('ttd.datapus');


Route::get('/dashboard', 'UserController@index')->name('dashboard.index');
Route::get('/dashboard/create', 'UserController@create')->name('dashboard.create');
Route::get('/dashboard/deleteuser/{id}', 'UserController@destroy');
Route::get('/dashboard/edituser/{id}', 'UserController@edit');
Route::get('/dashboard/datauser', 'UserController@datauser')->name('datauser');
Route::post('/dashboard/store', 'UserController@store')->name('dashboard.store');
Route::put('/dashboard/update/{id}', 'UserController@update')->name('dashboard.update');





Route::get('dashboard/laporan', 'UserController@printdata')->name('user.printdata');
Route::get('dashboard/laporan/datatahun', 'UserController@datatahun')->name('user.print.datatahun');
Route::get('dashboard/laporan/datatahun/lihat', 'UserController@printdatatahun')->name('user.print.data');

Route::get('dashboard/savedata', 'UserController@savedata')->name('user.savedata');
Route::get('dashboard/savedata/datatahun', 'UserController@datatahun2')->name('user.save.datatahun2');
Route::get('dashboard/savedata/datatahun/print', 'UserController@savedatatahun')->name('user.save.data');

Route::get('dashboard/skdn/laporan','SkdnController@laporan')->name('skdn.laporan');
Route::get('dashboard/skdn/laporan/datatahun', 'SkdnController@datatahun')->name('skdn.laporan.datatahun');
Route::get('dashboard/skdn/laporan/datatahun/lihat', 'SkdnController@lihat')->name('skdn.laporan.lihat');

Route::get('dashboard/kadarzi/laporan','KadarziController@laporan')->name('kadarzi.laporan');
Route::get('dashboard/kadarzi/laporan/datatahun', 'KadarziController@datatahun')->name('kadarzi.laporan.datatahun');
Route::get('dashboard/kadarzi/laporan/datatahun/lihat', 'KadarziController@lihat')->name('kadarzi.laporan.lihat');

Route::get('dashboard/pmt/laporan','PmtController@laporan')->name('pmt.laporan');
Route::get('dashboard/pmt/laporan/datatahun', 'PmtController@datatahun')->name('pmt.laporan.datatahun');
Route::get('dashboard/pmt/laporan/datatahun/lihat', 'PmtController@lihat')->name('pmt.laporan.lihat');

Route::get('dashboard/ttd/laporan','TtdController@laporan')->name('ttd.laporan');
Route::get('dashboard/ttd/laporan/datatahun', 'TtdController@datatahun')->name('ttd.laporan.datatahun');
Route::get('dashboard/ttd/laporan/datatahun/lihat', 'TtdController@lihat')->name('ttd.laporan.lihat');


Route::get('dashboard/data/input/{program}', 'DataController@tambahdata')->name('data.tambah');
Route::get('dashboard/data/input', 'DataController@dataprograminput')->name('data.input');
Route::post('dashboard/data/fetch', 'DataController@fetch')->name('data.fetch');

Route::get('dashboard/program/{id}/delete', 'ProgramController@destroy');
Route::get('dashboard/indikator/{id}/delete', 'IndikatorController@destroy');
Route::get('dashboard/target/{id}/delete', 'TargetController@destroy');
Route::get('dashboard/puskesmas/{id}/delete', 'PuskesmasController@destroy');


Route::post('dashboard/target/fetch', 'TargetController@fetch')->name('target.fetch');

Route::get('dashboard/data/{id}/dataprogram', 'DataController@dataprog')->name('data.dataprog');
Route::get('dashboard/data/{id}/{nama}', 'DataController@data')->name('data.data');
Route::get('dashboard/data/{id}/{nama}/{indi}', 'DataController@chart')->name('data.indi.chart');
Route::get('dashboard/laporan/datatahun', 'DataController@laporandatatahun')->name('laporan.datatahun');
//contoh pakai post
Route::post('dashboard/data/chart', 'DataController@chart2')->name('data.indi.chart2');


// Route::get('dashboard/kadarzi/printdata', 'KadarziController@printdata')->name('kadarzi.printdata');
// Route::get('dashboard/pmt/printdata', 'PmtController@printdata')->name('pmt.printdata');
// Route::get('dashboard/ttd/printdata', 'TtdController@printdata')->name('ttd.printdata');

// Route::get('dashboard/skdn/savedata','SkdnController@savedata')->name('skdn.savedata');
// Route::get('dashboard/kadarzi/savedata', 'KadarziController@savedata')->name('kadarzi.savedata');
// Route::get('dashboard/pmt/savedata', 'PmtController@savedata')->name('pmt.savedata');
// Route::get('dashboard/ttd/savedata', 'TtdController@savedata')->name('ttd.savedata');
// Route::get('kadarzi/delete/{id}', 'KadarziController@destroy');

Route::resource('dashboard/skdn', 'SkdnController');
Route::resource('dashboard/kadarzi', 'KadarziController');
Route::resource('dashboard/pmt', 'PmtController');
Route::resource('dashboard/ttd', 'TtdController');

Route::resource('dashboard/program','ProgramController');
Route::resource('dashboard/indikator','IndikatorController');
Route::resource('dashboard/target','TargetController');
Route::resource('dashboard/data', 'DataController');
Route::resource('dashboard/puskesmas', 'PuskesmasController');
// Route::resource('dashboard', 'UserController');