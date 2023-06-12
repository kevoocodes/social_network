<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', [LoginController::class, 'showLoginPage']);  //Route that makes login
Route::get('/register', [RegisterController::class, 'showRegisterPage']);  //Routes that makes register
Route::post('/register', [RegisterController::class, 'userRegister']);  //for registration
Route::post('/welcome', [LoginController::class, 'userLogin'])->name('login'); //for login

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'showDashboardPage']);
    Route::get('/create_post', [PostController::class, 'showCreatePostPage']);
    Route::post('/create_post', [PostController::class, 'addPost']);//adds posts page
    Route::get('/dashboard', [PostController::class, 'showAllPosts']);//shows all posts 
    Route::get('/post/{id}', [PostController::class, 'showPostpage']);//shows posts page
    Route::get('user_profile/{id}', [UserController::class, 'showUserProfile']);//shows user profile page
    Route::post('/post/{id}', [CommentController::class, 'addComment'])->name('comment.store');// function that add comment
    Route::get('/profile', [UserController::class, 'showProfilePage']); //This route shows profile page  showUpdateProfilePage
    Route::delete('/profile/{id}', [PostController::class, 'deletePost'])->name('post.destroy'); // function that delete post
    Route::get('/update_profile', [UserController::class, 'showUpdateProfilePage']);  //This is route to get update profile page
    Route::post('/update_profile', [UserController::class, 'updateProfile']); //This is route perfom profile update
    // Route::post('/dashboard/{post}', 'LikeController@toggleLike');
    // Route::post('/dashboard/{post}', [LikeController::class, 'toggleLike']); //This is route perfom profile update
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform'); 

});