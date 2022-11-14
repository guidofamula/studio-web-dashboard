<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\LocalizationController;

// Frontend route
use App\Http\Controllers\Layout\LandingController;

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
//    return view('welcome');
// });

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
        Route::get('/index', [FileManagerController::class, 'index'])->name('filemanager.index');
        Lfm::routes();
    });

    // Dashboard Roles (index, create, edit, update, show, destroy)
    Route::get('/roles/select', [RoleController::class, 'select'])->name('roles.select');
    Route::resource('/roles', RoleController::class);

    // Dashboard Users (index, create, edit, update, show, destroy)
    Route::resource('/users', UserController::class)->except('show');

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

// Home landing
Route::get('/', [LandingController::class, 'homePage'])->name('landing.home');

// Blog Landing
Route::get('/blog', [LandingController::class, 'blogPage'])->name('landing.blog');

// Post Detail Landing
Route::get('/blog/{slug}', [LandingController::class, 'showPostDetail'])->name('landing.post-detail');

// Categories Landing
Route::get('/categories', [LandingController::class, 'showCategories'])->name('landing.categories');

// Posts By Category
Route::get('/categories/{slug}', [LandingController::class, 'showPostsByCategory'])->name('landing.post-category');

// Tags Landing
Route::get('/tags', [LandingController::class, 'showTags'])->name('landing.tags');

// Posts By Tag
Route::get('/tags/{slug}', [LandingController::class, 'showPostsByTag'])->name('landing.post-tag');


// About Landing
Route::get('/about', [LandingController::class, 'aboutPage'])->name('landing.about');

