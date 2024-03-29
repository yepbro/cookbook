<?php

use App\Http\Controllers;
use App\Livewire\Pages;
use App\Livewire\Pages\Articles;
use App\Livewire\Pages\Tags;
use Illuminate\Support\Facades\Route;

Route::feeds();

Route::get('/robots.txt', Controllers\RobotsTxtController::class);

Route::get('/', Pages\Home::class)->name('pages.home');
Route::get('/search', Pages\Search::class)->name('pages.search');
Route::get('/tags', Tags\Index::class)->name('pages.tags.index');
Route::get('/tags/{tag:slug}', Tags\Show::class)->name('pages.tags.show');
Route::get('/items', Articles\Index::class)->name('pages.items.index');
Route::get('/items/{article:slug}', Articles\Show::class)->name('pages.items.show');
Route::get('/pages/{page:slug}', Pages\Page::class)->name('pages.pages.show');
Route::fallback(Pages\Page404::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
