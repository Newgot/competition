<?php

use App\Http\Controllers\AcademicDegreeController;
use App\Http\Controllers\AcademicTitleController;
use App\Http\Controllers\AdditionalAducationController;
use App\Http\Controllers\AdditionalTypeController;
use App\Http\Controllers\AducationLevelController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\PreparationController;
use App\Http\Controllers\PreparationLevelController;
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

// Авторизация
Route::group(
    [
        'as' => 'auth.',
    ],
    function () {
        Route::view('login', 'auth.login')->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::view('registration', 'auth.registration')->name('registration');
        Route::post('registration', [AuthController::class, 'registration'])->name('registration');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    }
);

// Компетенция
Route::group(
    [
        'as' => 'c.',
        'prefix' => 'competence',
    ],
    function () {
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
    }
);

// Работник
Route::group(
    [
        'as' => 'w.',
        'prefix' => 'worker',
    ],
    function () {
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
            ->where(
                [
                    'idWorker' => '[0-9]+',
                    'idCompetence' => '[0-9]+'
                ]
            )
            ->name('bindCompetence');
        Route::get(
            '{idWorker}/unbind-competence/{idCompetence}',
            [WorkerController::class, 'unbindCompetence']
        )
            ->where(
                [
                    'idWorker' => '[0-9]+',
                    'idCompetence' => '[0-9]+'
                ]
            )
            ->name('unBindCompetence');
    }
);

// Должность
Route::group(
    [
        'as' => 'p.',
        'prefix' => 'position',
    ],
    function () {
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
            ->where(
                [
                    'idPosition' => '[0-9]+',
                    'idCompetence' => '[0-9]+'
                ]
            )
            ->name('bindCompetence');
        Route::get(
            '{idPosition}/unbind-competence/{idCompetence}',
            [PositionController::class, 'unbindCompetence']
        )
            ->where(
                [
                    'idPosition' => '[0-9]+',
                    'idCompetence' => '[0-9]+'
                ]
            )
            ->name('unBindCompetence');
    }
);

// Звание
Route::group(
    [
        'as' => 'academic_title.',
        'prefix' => 'academic_title',
    ],
    function () {
        Route::get('/', [AcademicTitleController::class, 'all'])->name('all');
        Route::get('add', [AcademicTitleController::class, 'add'])->name('add');
        Route::post('add', [AcademicTitleController::class, 'create'])->name('add');
        Route::get('{id}/edit', [AcademicTitleController::class, 'edit'])
            ->where(['id' => '[0-9]+'])
            ->name('edit');
        Route::post('{id}/edit', [AcademicTitleController::class, 'update'])->name('edit');
        Route::post('{id}/delete', [AcademicTitleController::class, 'delete'])
            ->where(['id' => '[0-9]+'])
            ->name('delete');
    }
);

// Ученая степень
Route::group(
    [
        'as' => 'academic_degree.',
        'prefix' => 'academic_degree',
    ],
    function () {
        Route::get('/', [AcademicDegreeController::class, 'all'])->name('all');
        Route::get('add', [AcademicDegreeController::class, 'add'])->name('add');
        Route::post('add', [AcademicDegreeController::class, 'create'])->name('add');
        Route::get('{id}/edit', [AcademicDegreeController::class, 'edit'])
            ->where(['id' => '[0-9]+'])
            ->name('edit');
        Route::post('{id}/edit', [AcademicDegreeController::class, 'update'])->name('edit');
        Route::post('{id}/delete', [AcademicDegreeController::class, 'delete'])
            ->where(['id' => '[0-9]+'])
            ->name('delete');
    }
);

// Условия привлечения
Route::group(
    [
        'as' => 'attraction.',
        'prefix' => 'attraction',
    ],
    function () {
        Route::get('/', [AttractionController::class, 'all'])->name('all');
        Route::get('add', [AttractionController::class, 'add'])->name('add');
        Route::post('add', [AttractionController::class, 'create'])->name('add');
        Route::get('{id}/edit', [AttractionController::class, 'edit'])
            ->where(['id' => '[0-9]+'])
            ->name('edit');
        Route::post('{id}/edit', [AttractionController::class, 'update'])->name('edit');
        Route::post('{id}/delete', [AttractionController::class, 'delete'])
            ->where(['id' => '[0-9]+'])
            ->name('delete');
    }
);


// Вид дополнительного образования
Route::group(
    [
        'as' => 'additional_type.',
        'prefix' => 'additional_type',
    ],
    function () {
        Route::get('/', [AdditionalTypeController::class, 'all'])->name('all');
        Route::get('add', [AdditionalTypeController::class, 'add'])->name('add');
        Route::post('add', [AdditionalTypeController::class, 'create'])->name('add');
        Route::get('{id}/edit', [AdditionalTypeController::class, 'edit'])
            ->where(['id' => '[0-9]+'])
            ->name('edit');
        Route::post('{id}/edit', [AdditionalTypeController::class, 'update'])->name('edit');
        Route::post('{id}/delete', [AdditionalTypeController::class, 'delete'])
            ->where(['id' => '[0-9]+'])
            ->name('delete');
    }
);

// Вид документа
Route::group(
    [
        'as' => 'document_type.',
        'prefix' => 'document_type',
    ],
    function () {
        Route::get('/', [DocumentTypeController::class, 'all'])->name('all');
        Route::get('add', [DocumentTypeController::class, 'add'])->name('add');
        Route::post('add', [DocumentTypeController::class, 'create'])->name('add');
        Route::get('{id}/edit', [DocumentTypeController::class, 'edit'])
            ->where(['id' => '[0-9]+'])
            ->name('edit');
        Route::post('{id}/edit', [DocumentTypeController::class, 'update'])->name('edit');
        Route::post('{id}/delete', [DocumentTypeController::class, 'delete'])
            ->where(['id' => '[0-9]+'])
            ->name('delete');
    }
);

//  Дополнительное образование
Route::group(
    [
        'as' => 'add_ad.',
        'prefix' => 'add_ad',
    ],
    function () {
        Route::get('/', [AdditionalAducationController::class, 'all'])->name('all');
        Route::get('add', [AdditionalAducationController::class, 'add'])->name('add');
        Route::post('add', [AdditionalAducationController::class, 'create'])->name('add');
        Route::get('{id}/edit', [AdditionalAducationController::class, 'edit'])
            ->where(['id' => '[0-9]+'])
            ->name('edit');
        Route::post('{id}/edit', [AdditionalAducationController::class, 'update'])->name('edit');
        Route::post('{id}/delete', [AdditionalAducationController::class, 'delete'])
            ->where(['id' => '[0-9]+'])
            ->name('delete');
    }
);

//  Уровень подготовки
Route::group(
    [
        'as' => 'preparation_level.',
        'prefix' => 'preparation_level',
    ],
    function () {
        Route::get('/', [PreparationLevelController::class, 'all'])->name('all');
        Route::get('add', [PreparationLevelController::class, 'add'])->name('add');
        Route::post('add', [PreparationLevelController::class, 'create'])->name('add');
        Route::get('{id}/edit', [PreparationLevelController::class, 'edit'])
            ->where(['id' => '[0-9]+'])
            ->name('edit');
        Route::post('{id}/edit', [PreparationLevelController::class, 'update'])->name('edit');
        Route::post('{id}/delete', [PreparationLevelController::class, 'delete'])
            ->where(['id' => '[0-9]+'])
            ->name('delete');
    }
);

//  Уровень образования
Route::group(
    [
        'as' => 'aducation_level.',
        'prefix' => 'aducation_level',
    ],
    function () {
        Route::get('/', [AducationLevelController::class, 'all'])->name('all');
        Route::get('add', [AducationLevelController::class, 'add'])->name('add');
        Route::post('add', [AducationLevelController::class, 'create'])->name('add');
        Route::get('{id}/edit', [AducationLevelController::class, 'edit'])
            ->where(['id' => '[0-9]+'])
            ->name('edit');
        Route::post('{id}/edit', [AducationLevelController::class, 'update'])->name('edit');
        Route::post('{id}/delete', [AducationLevelController::class, 'delete'])
            ->where(['id' => '[0-9]+'])
            ->name('delete');
    }
);

//  Направление подготовки
Route::group(
    [
        'as' => 'preparation.',
        'prefix' => 'preparation',
    ],
    function () {
        Route::get('/', [PreparationController::class, 'all'])->name('all');
        Route::get('add', [PreparationController::class, 'add'])->name('add');
        Route::post('add', [PreparationController::class, 'create'])->name('add');
        Route::get('{id}/edit', [PreparationController::class, 'edit'])
            ->where(['id' => '[0-9]+'])
            ->name('edit');
        Route::post('{id}/edit', [PreparationController::class, 'update'])->name('edit');
        Route::post('{id}/delete', [PreparationController::class, 'delete'])
            ->where(['id' => '[0-9]+'])
            ->name('delete');
    }
);
