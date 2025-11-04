<?php
# routes/web.php

use App\Livewire\Actions\Brands\BrandCreate;
use App\Livewire\Actions\Brands\BrandDelete;
use App\Livewire\Actions\Brands\BrandEdit;
use App\Livewire\Actions\Brands\BrandIndex;
use App\Livewire\Actions\Brands\BrandShow;
use App\Livewire\Actions\Groups\GroupCreate;
use App\Livewire\Actions\Groups\GroupDelete;
use App\Livewire\Actions\Groups\GroupEdit;
use App\Livewire\Actions\Groups\GroupIndex;
use App\Livewire\Actions\Groups\GroupShow;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    /**
     * Groups
     */
    Route::prefix('/groups')->name('groups.')->group(function () {
        Route::get('/', GroupIndex::class)->name('index');
        Route::get('/criar', GroupCreate::class)->name('create');
        Route::get('/{group}', GroupShow::class)->name('show');
        Route::get('/{group}/editar', GroupEdit::class)->name('edit');
        Route::get('/{group}/deletar', GroupDelete::class)->name('delete');
    });


    /**
     * Brands
     */
    Route::prefix('/brands')->name('brands.')->group(function () {
        Route::get('/', BrandIndex::class)->name('index');
        Route::get('/criar', BrandCreate::class)->name('create');
        Route::get('/{brand}', BrandShow::class)->name('show');
        Route::get('/{brand}/editar', BrandEdit::class)->name('edit');
        Route::get('/{brand}/deletar', BrandDelete::class)->name('delete');
    });
});
