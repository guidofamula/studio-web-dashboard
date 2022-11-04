<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LocalizationController;
use \UniSharp\LaravelFilemanager\Lfm;

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
    return view('welcome');
});

// Dashboard start


Route::group([
    'prefix' => 'dashboard',
    'middleware' => [
        'web',
        'auth',
    ],
], function(){
    // Dashboard Index
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    // Dashboard Category (index, create, edit, update, show, destroy)
    Route::resource('/categories', CategoryController::class);

    // Dashboard Tags (index, create, edit, update, show, destroy)
    Route::resource('/tags', TagController::class)->except('show');
    // Tags for select in create post
    Route::get('/tags/select', [TagController::class, 'select'])->name('tags.select');

    // Dashboard Posts (index, create, edit, update, show, destroy)
    Route::resource('/posts', PostController::class);

    // Dashboard file manager
    Route::group(['prefix' => 'filemanager'], function () { 
        Lfm::routes();
 });


});
// Dashboard end

// Hide register auth start
Auth::routes([
    'register' => false
]);
// Hide register auth end

// Localization start
Route::get('localization/{language}', [LocalizationController::class, 'switch'])->name('localization.switch');
// Localization end

// Route::get('/home', [HomeController::class, 'index'])->name('home');
