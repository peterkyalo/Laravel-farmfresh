<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Category\AnimalController;
use App\Http\Controllers\Category\BlogController;
use App\Http\Controllers\Category\CropController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Option\FaunaController;
use App\Http\Controllers\Option\FloraController;
use App\Http\Controllers\Option\OptionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// auth routes
Auth::routes();





//option routes
Route::post('option', [OptionController::class, 'chooseOption'])->name('option');

//option routes
Route::get('/option/fauna/index', [FaunaController::class, 'index'])->name('fauna.index');
Route::get('/option/flora/index', [FloraController::class, 'index'])->name('flora.index');

// home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

// admin routes
// Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::middleware(['auth', 'role:admin|farmer'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    //crop category routes
    Route::get('category/crop/create', [CropController::class, 'create'])->name('crop.create');
    Route::post('category/crop/create', [CropController::class, 'store'])->name('crop.store');



    //animal category routes
    Route::get('/category/animal/create', [AnimalController::class, 'create'])->name('animal.create');
    Route::post('/category/animal/create', [AnimalController::class, 'store'])->name('animal.store');
    Route::get('/category/animal/index', [AnimalController::class, 'index'])->name('animal.index');
    Route::get('/category/animal/{id}/edit', [AnimalController::class, 'edit'])->name('animal.edit');
    Route::put('/category/animal/{id}/update', [AnimalController::class, 'update'])->name('animal.update');
    Route::delete('/category/animal/{id}/delete', [AnimalController::class, 'destroy'])->name('animal.destroy');

    //blog category routes
    Route::get('/category/blogs/index', [BlogController::class, 'index'])->name('blog.index');
    Route::get('category/blogs/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('category/blogs/create', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/category/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/category/blogs/{blog}/update', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/category/blogs/{blog}/delete', [BlogController::class, 'destroy'])->name('blog.destroy');

    //role routes
    Route::resource('/roles', RoleController::class);
    Route::post('roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');

    //user routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permissions}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

});