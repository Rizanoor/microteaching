<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\RegencyController as AdminRegency;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\Admin\GalleryController as AdminGallery;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

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


// Route::get('/', function () {
//     return view('pages.home');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/details/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');



Route::middleware(['auth'])->group(function () {
    // admin dashboard
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [AdminDashboard::class, 'index'])->name('admin.dashboard');
        // admin
        Route::resource('category', AdminCategory::class);
        // Route::resource('post', AdminRegency::class);
        Route::resource('gallery', AdminGallery::class);
    });
});



require __DIR__.'/auth.php';
