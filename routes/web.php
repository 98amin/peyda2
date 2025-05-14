<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/results', [HomeController::class, 'searchResult']);

Route::get('/media/gallery/videosPage', [GalleryController::class, 'index'])->name('media.gallery.videosPage');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.adminHome');

Route::get('/person/create', [PersonController::class, 'create'])->name('person.create');
Route::post('/person/store', [PersonController::class, 'store'])->name('person.store');
Route::get('/person/{person}/edit', [PersonController::class, 'edit'])->name('person.edit');
Route::put('/person/{person}', [PersonController::class, 'update'])->name('person.update');
Route::delete('/person/{personId}',[PersonController::class, 'destroy']);
