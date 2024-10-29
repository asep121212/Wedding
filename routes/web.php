<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\ProfilenController;
use App\Http\Controllers\DateController; 
use App\Http\Controllers\VideoController; 
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Gallery routes
Route::middleware(['auth:sanctum', 'verified'])->get('admin/galleries/gallery/destroy/{id}', 'App\Http\Controllers\GalleryController@destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/galleries/gallery/edit/{id}', 'App\Http\Controllers\GalleryController@edit');
Route::middleware(['auth:sanctum', 'verified'])->resource('/admin/galleries/gallery', GalleryController::class);
Route::middleware(['auth:sanctum', 'verified'])->post('admin/galleries/gallery/update', 'App\Http\Controllers\GalleryController@update');

// Card routes
Route::middleware(['auth:sanctum', 'verified'])->resource('/admin/card/card', CardController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('admin/card/card/edit/{id}', 'App\Http\Controllers\CardController@edit');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/card/card/destroy/{id}', 'App\Http\Controllers\CardController@destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/card/card/update', 'App\Http\Controllers\CardController@update');
// Timeline routes
Route::middleware(['auth:sanctum', 'verified'])->resource('/admin/timeline/timeline', TimelineController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('admin/timeline/timeline/edit/{id}', 'App\Http\Controllers\TimelineController@edit');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/timeline/timeline/destroy/{id}', 'App\Http\Controllers\TimelineController@destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/timeline/timeline/update', 'App\Http\Controllers\TimelineController@update');
// Profile routes
Route::middleware(['auth:sanctum', 'verified'])->resource('/admin/profilen/profilen', ProfilenController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('admin/profilen/profilen/edit/{id}', 'App\Http\Controllers\ProfilenController@edit');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/profilen/profilen/destroy/{id}', 'App\Http\Controllers\ProfilenController@destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/profilen/profilen/update', 'App\Http\Controllers\ProfilenController@update');

// Date routes
Route::middleware(['auth:sanctum', 'verified'])->resource('/admin/date/date', DateController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/date/date/edit/{id}', 'App\Http\Controllers\DateController@edit');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/date/date/destroy/{id}', 'App\Http\Controllers\DateController@destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/date/date/update', 'App\Http\Controllers\DateController@update');

// Video routes
Route::middleware(['auth:sanctum', 'verified'])->resource('/admin/video/video', VideoController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/video/video/edit/{id}', 'App\Http\Controllers\VideoController@edit');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/video/video/destroy/{id}', 'App\Http\Controllers\VideoController@destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/video/video/update', 'App\Http\Controllers\VideoController@update');


Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// Welcome and Dashboard routes
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Additional dashboard group with middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});