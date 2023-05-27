<?php

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

Route::middleware(['web'])->group(function () {
    Auth::routes();
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);
    Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);
    Route::get('/members', [App\Http\Controllers\MemberController::class, 'index']);
    Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);

    Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
    Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
    Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
    Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
    Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
    Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

    Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
    Route::get('/publishers/create', [App\Http\Controllers\PublisherController::class, 'create']);
    Route::post('/publishers', [App\Http\Controllers\PublisherController::class, 'store']);
    Route::get('/publishers/{publisher}/edit', [App\Http\Controllers\PublisherController::class, 'edit']);
    Route::put('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'update']);

    });

    Route::get('get-all-session', function () {
        $session = session()->all();
        p($session);

    });

    Route::get('set-session', function (Request $request) {
        $request->session()->put('name');
        $request->session()->put('gender');
        $request->session()->put('phone_number');
        $request->session()->put('address');
        $request->session()->put('email');
        return redirect('get-all-session');

    });

    Route::get('destroy-session', function () {
        session()-forget(['name', 'gender', 'phone_number', 'address', 'email']);
        //session()->forget('user_id');
        return redirect('get-all-session');

    });

});
