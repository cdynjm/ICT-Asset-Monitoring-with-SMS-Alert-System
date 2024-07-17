<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ClassHistoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\PrintController;

Route::get('/storage', function () {
    Artisan::call('storage:link');
});

Route::group(['middleware' => 'auth'], function () {

	Route::get('instructors', [InstructorController::class, 'read'])->name('instructors');
	Route::get('rooms', [RoomController::class, 'read'])->name('rooms');
	Route::get('semester', [RoomController::class, 'semester'])->name('semester');
	Route::get('room-schedule', [RoomController::class, 'roomSchedule'])->name('room-schedule');
	Route::get('unschedule-class', [ScheduleController::class, 'unscheduleClass'])->name('unschedule-class');
	Route::get('borrowed-assets', [AssetController::class, 'read'])->name('borrowed-assets');
	Route::get('registered-assets', [AssetController::class, 'assets'])->name('registered-assets');
	Route::get('reports', [ReportController::class, 'read'])->name('reports');
	Route::get('issues', [ReportController::class, 'issues'])->name('issues');
	Route::get('class-history', [ClassHistoryController::class, 'read'])->name('class-history');
	Route::get('sms-configuration', [SMSController::class, 'read'])->name('sms-configuration');
	Route::get('print', [PrintController::class, 'print'])->name('print');
	Route::get('view-asset-history', [AssetController::class, 'viewAssetHistory'])->name('view-asset-history');

	Route::group(['prefix' => 'get'], function () {
		Route::post('person', [AssetController::class, 'getPerson']);
	});
	Route::group(['prefix' => 'create'], function () {
		Route::post('instructor', [InstructorController::class, 'create']);
		Route::post('room', [RoomController::class, 'create']);
		Route::post('semester', [RoomController::class, 'createSemester']);
		Route::post('room-schedule', [RoomController::class, 'createRoomSchedule']);
		Route::post('asset', [AssetController::class, 'create']);
		Route::post('new-asset', [AssetController::class, 'newAsset']);
		Route::post('schedule', [ScheduleController::class, 'create']);
		Route::post('report', [ReportController::class, 'create']);
		Route::post('issue', [ReportController::class, 'createIssue']);
		Route::post('comment', [ReportController::class, 'createComment']);
	});

	Route::group(['prefix' => 'update'], function () {
		Route::post('instructor', [InstructorController::class, 'update']);
		Route::post('room', [RoomController::class, 'update']);
		Route::post('return-asset', [AssetController::class, 'return']);
		Route::post('asset', [AssetController::class, 'update']);
		Route::post('new-asset', [AssetController::class, 'updateRegisteredAsset']);
		Route::post('report', [ReportController::class, 'update']);
		Route::post('fixed-report', [ReportController::class, 'fixed']);
		Route::post('notify', [ReportController::class, 'notify']);
		Route::post('sms-configuration', [SMSController::class, 'update']);
		Route::post('issue', [ReportController::class, 'updateIssue']);
		Route::post('room-schedule', [RoomController::class, 'updateRoomSchedule']);
		Route::post('semester', [RoomController::class, 'updateSemester']);
	});

	Route::group(['prefix' => 'delete'], function () {
		Route::post('instructor', [InstructorController::class, 'delete']);
		Route::post('room', [RoomController::class, 'delete']);
		Route::post('asset', [AssetController::class, 'delete']);
		Route::post('registered-asset', [AssetController::class, 'deleteRegisteredAsset']);
		Route::post('report', [ReportController::class, 'delete']);
		Route::post('issue', [ReportController::class, 'deleteIssue']);
		Route::post('room-schedule', [RoomController::class, 'deleteRoomSchedule']);
		Route::post('semester', [RoomController::class, 'deleteSemester']);
	});

	Route::group(['prefix' => 'search'], function () {
		Route::post('class-logs', [ClassHistoryController::class, 'search']);
		Route::post('issue', [ReportController::class, 'searchIssue']);
		Route::post('asset', [AssetController::class, 'searchAsset']);
		Route::post('select-room', [RoomController::class, 'selectRoom']);
		Route::post('room', [ReportController::class, 'selectRoom']);
	});

    Route::get('/', [HomeController::class, 'home']);

	Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');