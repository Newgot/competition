<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('position-bind-worker', [HomeController::class, 'positionBindWorker'])->name('positionBindWorker');


Route::group([
    'as' => 'auth.',
], function () {
    Route::view('login', 'auth.login')->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::view('registration', 'auth.registration')->name('registration');
    Route::post('registration', [AuthController::class, 'registration'])->name('registration');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::group([
    'as' => 'c.',
    'prefix' => 'competence',
], function () {
    Route::get('/', [CompetenceController::class, 'all'])->name('all');
    Route::get('add', [CompetenceController::class, 'add'])->name('add');
    Route::post('add', [CompetenceController::class, 'create'])->name('add');
    Route::get('{id}/edit', [CompetenceController::class, 'edit'])
        ->where(['id' => '[0-9]+'])
        ->name('edit');
    Route::post('{id}/edit', [CompetenceController::class, 'update'])->name('edit');
    Route::post('{id}/delete', [CompetenceController::class, 'delete'])
        ->where(['id' => '[0-9]+'])
        ->name('delete');
});

Route::group([
    'as' => 'w.',
    'prefix' => 'worker',
], function () {
    Route::get('/', [WorkerController::class, 'all'])->name('all');
    Route::get('add', [WorkerController::class, 'add'])->name('add');
    Route::post('add', [WorkerController::class, 'create'])->name('add');
    Route::get('{id}/edit', [WorkerController::class, 'edit'])
        ->where(['id' => '[0-9]+'])
        ->name('edit');
    Route::post('{id}/edit', [WorkerController::class, 'update'])->name('edit');
    Route::post('{id}/delete', [WorkerController::class, 'delete'])
        ->where(['id' => '[0-9]+'])
        ->name('delete');
    Route::get(
        '{idWorker}/bind-competence/{idCompetence}',
        [WorkerController::class, 'bindCompetence']
    )
        ->where([
            'idWorker' => '[0-9]+',
            'idCompetence' => '[0-9]+'
        ])
        ->name('bindCompetence');
    Route::get(
        '{idWorker}/unbind-competence/{idCompetence}',
        [WorkerController::class, 'unbindCompetence']
    )
        ->where([
            'idWorker' => '[0-9]+',
            'idCompetence' => '[0-9]+'
        ])
        ->name('unBindCompetence');
});

Route::group([
    'as' => 'p.',
    'prefix' => 'position',
], function () {
    Route::get('/', [PositionController::class, 'all'])->name('all');
    Route::get('add', [PositionController::class, 'add'])->name('add');
    Route::post('add', [PositionController::class, 'create'])->name('add');
    Route::get('{id}/edit', [PositionController::class, 'edit'])
        ->where(['id' => '[0-9]+'])
        ->name('edit');
    Route::post('{id}/edit', [PositionController::class, 'update'])->name('edit');
    Route::post('{id}/delete', [PositionController::class, 'delete'])
        ->where(['id' => '[0-9]+'])
        ->name('delete');
    Route::get(
        '{idPosition}/bind-competence/{idCompetence}',
        [PositionController::class, 'bindCompetence']
    )
        ->where([
            'idPosition' => '[0-9]+',
            'idCompetence' => '[0-9]+'
        ])
        ->name('bindCompetence');
    Route::get(
        '{idPosition}/unbind-competence/{idCompetence}',
        [PositionController::class, 'unbindCompetence']
    )
        ->where([
            'idPosition' => '[0-9]+',
            'idCompetence' => '[0-9]+'
        ])
        ->name('unBindCompetence');
});
