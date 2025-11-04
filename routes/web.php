<?php
# routes/web.php

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
});
