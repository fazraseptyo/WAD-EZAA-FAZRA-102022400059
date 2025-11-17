<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

/**
*   - Middleware: `auth` dan `role:admin`
*   - Prefix URL: `/admin`
*   - Rute-rute terkait CRUD buku:
*       - GET `/books` → `BookController@index` (route name: `books.index`)
*       - GET `/books/create` → `BookController@create` (route name: `books.create`)
*       - POST `/books` → `BookController@store` (route name: `books.store`)
*       - GET `/books/{book}/edit` → `BookController@edit` (route name: `books.edit`)
*       - PUT `/books/{book}` → `BookController@update` (route name: `books.update`)
*       - DELETE `/books/{book}` → `BookController@destroy` (route name: `books.destroy`)
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
   // isi disini
   route :: get ('/books', [BookController::class, 'index']) -> name ('books.index');
   route :: get ('/books/create', [BookController::class, 'create']) -> name ('books.create');
   route :: post ('/books', [BookController::class, 'store']) -> name ('books.store');
   route :: get ('/books/{book}/edit', [BookCoontroller::class, 'edit']) -> name ('books.edit');
   route :: put ('/books/{book}', [BookController::class, 'update']) -> name ('books.update');
   route :: delete ('/books/{book}', [BookController::class, 'destroy']) -> name ('books.destroy');
   

});
