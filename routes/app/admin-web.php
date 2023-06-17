<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('api/users', [DashboardController::class, 'getUsers']);

Route::namespace('admin')->prefix('admin')->group(function () {

    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');

    Route::post('/auth', [AdminController::class, 'auth'])->name('admin.auth');

    Route::middleware('admin')->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

        Route::get('/processos', [DashboardController::class, 'processes'])->name('admin.processes');
        Route::post('/processos/create', [DashboardController::class, 'processCreate'])->name('admin.process.create');

        Route::get('/user/{id}', [DashboardController::class, 'user'])->name('admin.user');
        // Route::post('/user/download/file/{id}', [DashboardController::class, 'downloadFile'])
        //     ->name('admin.user.download.file');

        Route::get('/user/download/file/{user_id}/{file_path}/{file_original_name}', [DashboardController::class, 'downloadFile'])
            ->name('download.file');

        Route::get('/user/download/file/{user_id}', [DashboardController::class, 'downloadAllFiles'])
            ->name('download.all.files');
    });
});
