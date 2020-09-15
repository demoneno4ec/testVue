<?php
declare(strict_types=1);

use Illuminate\Support\Facades\App;
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

App::setLocale('ru');

Route::get('/', 'App\Http\Controllers\ApartmentController@index')->name('apartmentsPage');
Route::get('/list', 'App\Http\Controllers\ApartmentController@list')->name('apartments');
