<?php

use App\Livewire\Pages;
use Illuminate\Support\Facades\Route;

Route::get('/', Pages\Home::class)->name('pages.home');
Route::get('/search', Pages\Search::class)->name('pages.search');
Route::get('/tags', Pages\Tags::class)->name('pages.tags.index');
Route::get('/tags/{tag:slug}', Pages\Tag::class)->name('pages.tags.show');
Route::get('/items/{article:slug}', Pages\Article::class)->name('pages.items.show');
Route::get('/pages/{page:slug}', Pages\Page::class)->name('pages.pages.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
