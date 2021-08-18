<?php

use Illuminate\Foundation\Application;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//read
Route::middleware(['auth:sanctum', 'verified'])->get('/pizzas',
[PizzaController::class,'pizzas'])->name("pizzas");

//display
Route::get('/',
[PizzaController::class,'index'])->name("home");

// create
Route::post('/',
[PizzaController::class,'insert'])->name("insert");

//delete
Route::get('/pizzas/{id}',[PizzaController::class,'delete'])->name('delete');

// edit route
Route::get("/pizzas/edit/{id}",
[PizzaController::class,'edit'])->name('edit');

//update form
Route::post('/pizzas/update/{id}',
[PizzaController::class,'update'])->name('update');

//logout
Route::get("/logout",function()
{
    Auth::logout();
    return redirect()->route("login");
})->name('logout');