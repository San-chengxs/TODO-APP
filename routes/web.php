<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Rute root yang mengarah ke halaman daftar tugas (index)
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Rute untuk menampilkan form tambah tugas
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// Rute untuk menyimpan tugas baru
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Rute untuk menampilkan form edit tugas
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// Rute untuk memperbarui tugas
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

// Rute untuk menghapus tugas
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
