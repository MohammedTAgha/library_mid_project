<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LibraryController;

Route::get('/books', [LibraryController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [LibraryController::class, 'show'])->name('books.show');
Route::get('/books/create', [LibraryController::class, 'create'])->name('books.create');
Route::post('/books', [LibraryController::class, 'store'])->name('books.store');
Route::get('/books/{id}/edit', [LibraryController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [LibraryController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [LibraryController::class, 'destroy'])->name('books.destroy');
Route::get('/borrows/create', [BorrowController::class, 'create'])->name('borrows.create');
Route::post('/borrows', [BorrowController::class, 'store'])->name('borrows.store');
Route::get('/', function () {
return view('home');
});
