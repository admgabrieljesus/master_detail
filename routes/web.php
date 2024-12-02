<?php

use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ItemCompraController;


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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['web', 'auth'])->group(function () {
    // Rota para o CRUD completo de compras (resource)
    Route::resource('compras', CompraController::class);
    Route::resource('avaliacoes', AvaliacaoController::class);

    // Rota para o CRUD de itens de compra (resource)
    Route::resource('itens_compras', ItemCompraController::class)->only(['store', 'update', 'destroy']);

    // Rota para listar categorias
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');

    // Rota para listar produtos
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');

    // Rota para listar produtos
    Route::get('/notifications', [CompraController::class, 'notifications'])->name('compra.notifications');
    Route::get('/listnotifications', [CompraController::class, 'listnotifications']);
});

require __DIR__.'/auth.php';
