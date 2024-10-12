<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\MessagingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('My Profile');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/delete-image', [ProfileController::class, 'deleteImage'])->name('profile.delete_image');
    Route::get('/me', [ProfileController::class, 'index'])->name('profile');
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'showProfile']);



    Route::get('/messages/{conversation_id}', [MessagingController::class, 'index'])->name('messages.index');
    Route::post('/messages/send', [MessagingController::class, 'sendMessage'])->name('messages.send');

    Route::get('index', [JobController::class, 'index'])->name('jobs.index');
    Route::get('post-job', [UserController::class, 'postJob'])->name('jobs.post');
    Route::post('jobs/store', [JobController::class, 'store'])->name('jobs.store');
    Route::get('application/{job_id}', [JobController::class, 'apply'])->name('jobs.apply');
    Route::post('application', [ApplicationController::class, 'storeApp'])->name('application.store');
    Route::get('blog', [ApplicationController::class, 'indexApp'])->name('blog.index');
    Route::post('application/approve/{application_id}', [ApplicationController::class, 'approve'])->name('application.approve');
    Route::post('application/decline/{application_id}', [ApplicationController::class, 'decline'])->name('application.decline');

    Route::post('post/store', [PostsController::class, 'storePost'])->name('posts.store');
    Route::get('posts', [PostsController::class, 'indexPost'])->name('posts.index');
    Route::get('posts/{user_id}', [PostsController::class, 'indexPost'])->name('posts.user');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
