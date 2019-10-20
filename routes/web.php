<?php


Route::get('/', function () {
    return view('web/home');   
   })->name('home');

Route::get('/login', function () {
    return Auth::guard('web')->check() ? redirect()->route('dashboard') : view('web/login');
  })->name('login');

Route::get('/register', function () {
    return Auth::guard('web')->check() ? redirect()->route('dashboard') : view('web/register');
  })->name('register');


Route::post('/login', 'AuthController@postLogin')->name('post-login');
Route::post('/register', 'AuthController@postRegister')->name('post-register');

Route::get('/403', function() {
      return view('web/403');
  });

  Route::group(['middleware' => ['web', 'Allowed']], function () {

    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::post('/logout', 'AuthController@logout')->name('logout');

  });

