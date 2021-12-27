<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\PeopleAuthenticate;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CheckerController;

Route::prefix('login')->group(function () {
    Route::get('/', [ SignInController::class, 'index'])->name('signIn');
    Route::post('/validar', [ SignInController::class, 'validation' ])->name('signIn.validation');
});

Route::get('/logout', [ LogoutController::class, 'logout' ])->name('logout');

Route::middleware([ PeopleAuthenticate::class ])->group(function () {
    Route::prefix('aula')->group(function () {
        Route::get('/', [ ClassesController::class, 'index' ])->name('class.list');
        Route::get('/cadastrar', [ ClassesController::class, 'create' ])->name('class.create');
        Route::post('/salvar', [ ClassesController::class, 'store' ])->name('class.store');
        Route::get('/{id}/detalhes', [ ClassesController::class, 'show' ])->name('class.show');
        Route::delete('/{id}', [ ClassesController::class, 'disable'])->name('class.disable');

        Route::prefix('{id}/check')->group(function () {
            Route::post('/in', [ CheckerController::class, 'in' ])->name('check.in');
            Route::post('/out', [ CheckerController::class, 'out' ])->name('check.out');
        });
    });
});
