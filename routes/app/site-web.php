<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\UserController;
use App\Http\Controllers\Site\AuthController;

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('user-logado', [UserController::class, 'user']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', function () {
        $user = Auth::user();
        if ($user && $user->profile && $user->profile->name) {
            $homeController = new HomeController();
            return $homeController->home();
        } else {
            $homeController = new HomeController();
            return $homeController->firstLogin();
        }
    });

    Route::post('/register-profile', [HomeController::class, 'registerProfile'])->name('register.profile');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'checkProfile'
])->group(function () {

    Route::post('/inscricao', [UserController::class, 'userProcessSignUp'])->name('user.process.signup');


    Route::prefix('/usuario')->group(function () {
        //Profile
        Route::get('/perfil', [UserController::class, 'profile'])->name('profile');
        Route::put('/perfil', [UserController::class, 'profileUpdate'])->name('profile.update');
        //Address
        Route::get('/endereco', [UserController::class, 'address'])->name('address');
        Route::put('/endereco', [UserController::class, 'addressUpdate'])->name('address.update');
        //File
        Route::get('/arquivos', [UserController::class, 'file'])->name('file');
        Route::post('/arquivos', [UserController::class, 'fileUpdate'])->name('file.update');
        Route::post('/courses', [UserController::class, 'updateCourses'])->name('courses.update');
        Route::post('/receipts', [UserController::class, 'updateReceipts'])->name('receipts.update');
        Route::post('/file/delete/{id}', [UserController::class, 'fileDelete'])->name('file.delete');
    });
});
