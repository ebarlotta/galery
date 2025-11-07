<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\UploadImage;
use App\Livewire\AdminGallery;
use App\Livewire\ImageCarousel;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', ImageCarousel::class)->name('carousel');
Route::get('/upload', UploadImage::class)->name('upload');
Route::get('/admin', AdminGallery::class)->name('admin');
