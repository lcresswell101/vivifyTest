<?php

use App\Livewire\Index\Index;
use App\Livewire\Posts\PostCreate;
use App\Livewire\Posts\PostUpdate;
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

Route::get('/', Index::class);

Route::prefix('posts')->group(function() {
    Route::get('/create', PostCreate::class)->name('posts.create');
    Route::get('/{post}/update', PostUpdate::class)->name('posts.update');
});
