<?php

use App\Events\UserRegisterd;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Jobs\SendMail;
use App\Models\Post;
use App\Models\User;
use App\Models\Product;
use App\Mail\PostPublished;
use App\DataTables\UsersDataTable;
use App\Models\Feature;
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
    $feature = Feature::all(); // Fetch all features from the database
    return view('ashop', ['features' => $feature]); // Pass features to the view
});

Route::get('login', [App\Http\Controllers\LoginController::class, 'handleLogin'])->name('login');
Route::get('register', [App\Http\Controllers\LoginController::class, 'register'])->name('register');
