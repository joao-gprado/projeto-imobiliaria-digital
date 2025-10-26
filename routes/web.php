<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImovelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [ImovelController::class, 'index'])->name('imoveis.index');
Route::get('/imovel/{id}', [ImovelController::class, 'show'])->name('imoveis.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/imoveis/cadastrar', [ImovelController::class, 'create'])->name('imoveis.create');
    Route::post('/imoveis', [ImovelController::class, 'store'])->name('imoveis.store');
});

require __DIR__.'/auth.php';
