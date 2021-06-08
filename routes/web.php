<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
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

// routes available without login
Route::redirect('/', 'home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/get', [EventController::class, 'fetchData'])->name('sort');
Route::get('/sports', [SportController::class, 'index'])->name('sports');
Route::get('/events/{id}',[EventController::class, 'showDetail'])->whereNumber('id')->name('event-detail');
Route::get('/login', [LoginController::class, 'index'])->name('login-form');
Route::get('/register', [RegisterController::class, 'index'])->name('register-form');
Route::get('/unauthenticated', [LoginController::class, 'redirectToLogin'])->name('unauth');

// routes available only after login
Route::get('/profile', [UserController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/ticket-detail/{id}',[TicketController::class, 'showTicket'])->whereNumber('id')->name('show-ticket')->middleware('auth');
Route::get('/ticket-detail/{id}/pdf',[TicketController::class, 'createPDF'])->whereNumber('id')->name('ticket-pdf')->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::get('/cart/empty', [CartController::class, 'emptyCart'])->name('cart.empty')->middleware('auth');
Route::get('/cart/checkout/{total}', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::get('/buy/{id}', [CartController::class, 'add'])->name('buy')->whereNumber('id')->middleware('auth');
Route::get('/remove/{id}', [CartController::class, 'remove'])->whereNumber('id')->name('remove')->middleware('auth');

Route::post('/cart/purchase', [TicketController::class, 'create'])->name('purchase')->middleware('auth');
Route::post('/sports/{sport}/favorite', [SportController::class, 'favoriteSport'])->name('favorite')->middleware('auth');
Route::post('/cart/update', [CartController::class, 'changeEventNumber'])->name('update-cart')->middleware('auth');

Route::namespace('Auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
});

//OAuth socialite routes
Route::get('/login/{service}', [LoginController::class, 'authRedirect'])->name('login.service');
Route::get('/login/{service}/callback', [LoginController::class, 'authServiceCallback'])->name('login.callback');
