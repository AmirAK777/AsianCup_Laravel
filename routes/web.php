<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\StadeController;
use App\Http\Controllers\BilletController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;



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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
// Route::get('/home', [HomeController::class, 'match'])->middleware('auth')->name('home');




Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
    Route::post('/matches', [MatchController::class, 'store'])->name('matches.store');
    Route::get('/matches/{id}', [MatchController::class, 'show'])->name('matches.show');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/stades/create', [StadeController::class, 'create'])->name('stades.create');
    Route::post('/stades', [StadeController::class, 'store'])->name('stades.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/teams/create', [ClubController::class, 'create'])->name('teams.create');
    Route::post('/teams', [ClubController::class, 'store'])->name('teams.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/billets/create', [BilletController::class, 'create'])->name('billets.create');
    Route::post('/billets', [BilletController::class, 'store'])->name('billets.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // Member Routes
    // GET
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/{id}', [CartController::class, 'showForm'])->name('cart.form');
    Route::get('/history', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/ticket/download/{id}', [TicketController::class, 'download'])->name('ticket.download');
    // POST
    Route::post('/cart', [CartController::class, 'store'])->name('cart.create');
    Route::post('/checkout',[TransactionController::class, 'store'])->name('transaction.create');
    // Route::post('/review', [TestimonyController::class, 'store'])->name('testimony.create');
    // PATCH
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    // Route::patch('/review/{id}', [TestimonyController::class, 'update'])->name('testimony.update');
    //DELETE
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');
});

Route::middleware('auth')->group(function () {
    Route::resource('/ticket', TicketController::class);
});




require __DIR__ . '/auth.php';
