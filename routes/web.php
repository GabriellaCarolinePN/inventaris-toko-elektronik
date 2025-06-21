<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Produk
Route::get('/product', [ProdukController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProdukController::class, 'create'])->name('product.create');
Route::post('/product', [ProdukController::class, 'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProdukController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProdukController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProdukController::class, 'destroy'])->name('product.destroy');

// Export
Route::get('/product/export/pdf', [ProdukController::class, 'exportPdf'])->name('product.export.pdf');
Route::get('/product/export/excel', [ProdukController::class, 'exportExcel'])->name('product.export.excel');
