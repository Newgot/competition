<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    if (Auth::check()) {
        return view('master');
    }
    return redirect('login');
});

Route::group([
    'as' => 'auth.'
], function() {
    Route::view('login', 'auth.login')->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::view('registration', 'auth.registration')->name('registration');
    Route::post('registration', [AuthController::class, 'registration'])->name('registration');
});
