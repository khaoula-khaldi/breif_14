<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\controllers\FriendRequestController;
use Illuminate\Support\Facades\Route;
use App\Models\Like;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/register', [RegisteredUserController::class, 'create']) ->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/search', [SearchController::class, 'index'])->middleware('auth')->name('search');  
    Route::post('/friend-request/send/{id}', [FriendRequestController::class, 'send'])->middleware('auth')->name('friendRequest.send');
    Route::get('/friend-requests/recevoir', [FriendRequestController::class, 'recevoir'])->name('friendRequest.recevoir')->middleware('auth');
    Route::post('/friend-request/{id}/accept', [FriendRequestController::class, 'accept'])->name('friendRequest.accept');
    Route::post('/friend-request/{id}/refuse', [FriendRequestController::class, 'refuse'])->name('friendRequest.refuse');
    Route::get('/friends',[FriendRequestController::class,'friends'])->middleware('auth')->name('friendRequest.friends');

    Route::get('/post',[PostController::class,'create'])->middleware('auth')->name('post.create');
    Route::post('/posts', [PostController::class,'store'])->middleware('auth')->name('post.store');
    Route::get('/dashboard', [SearchController::class,'index'])->middleware(['auth'])->name('dashboard');


    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');

    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('like');

    Route::get('/home', [PostController::class, 'index'])->middleware(['auth','verified'])->name('home');

});

require __DIR__.'/auth.php';

              




