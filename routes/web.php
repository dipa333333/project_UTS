<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('books.index');
});

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

// Edit buku
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

// Update buku
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

// Halaman statis
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/kategori', [PageController::class, 'kategori'])->name('kategori');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
