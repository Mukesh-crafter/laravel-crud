<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\profileController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;


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

Route::group(['middleware' => 'auth'], function(){
	Route::get('/dashboard', function () {
		$id = Auth::user()->id;
		$posts = Auth::user()->posts;
    return view('dashboard', compact('posts'));
	})->name('dashboard');

	Route::view('profile', 'profile')->name('profile');
	Route::	put('profile',[profileController::class, 'update'])->name('profile.update');

});

Route::resource('posts', PostController::class)->middleware('auth');;


require __DIR__.'/auth.php';
