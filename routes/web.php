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

Route::middleware(['basicAuth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/contacts', 'ContactsController@index')->name('contacts');

    Route::post('/contacts', 'ContactsController@send');

    Route::get('/consultation', function () {
        return view('consultation');
    })->name('consultation');

    Route::get('/cooperation', function () {
        return view('cooperation');
    })->name('cooperation');

    Route::get('/work', function () {
        return view('work');
    })->name('work');

    Route::prefix('work')->group(function () {
      Route::get('abido', function () {
          return view('work.abido');
      })->name('work.abido');

      Route::get('badcube', function () {
        return view('work.badcube');
      })->name('work.badcube');

      Route::get('domonos', function () {
        return view('work.domonos');
      })->name('work.domonos');

      Route::get('festmarket', function () {
        return view('work.festmarket');
      })->name('work.festmarket');

      Route::get('kenaz', function () {
        return view('work.kenaz');
      })->name('work.kenaz');

      Route::get('melamenu', function () {
        return view('work.melamenu');
      })->name('work.melamenu');

      Route::get('sleki', function () {
        return view('work.sleki');
      })->name('work.sleki');
    });

    Route::get('/resume', function () {
        return view('resume');
    })->name('resume');
});
