<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Roles;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware(Roles::class . ':admin')->group(function () {
        Route::get('/admin', function () {
            return Inertia::render('Admin/Index');
        })->name('admin');

        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
        Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    });

    Route::resource('blogs', BlogController::class);
    Route::get('/my-blogs', [BlogController::class, 'myBlogs'])->name('blogs.my');
});





