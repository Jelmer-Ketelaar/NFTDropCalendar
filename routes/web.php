<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DropController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/index', [HomeController::class, 'index']);

// Drops
Route::get('/exploreDrops', [DropController::class, 'explore'])->name('drops.explore');
Route::get('/nft', [DropController::class, 'show'])->name('drops.show');
Route::get('/listDropFree', [DropController::class, 'create'])->name('drops.create');
Route::get('/listDrop', [DropController::class, 'create']);
Route::post('/listingProces', [DropController::class, 'store'])->name('drops.store');

// Projects
Route::get('/exploreProject', [ProjectController::class, 'explore'])->name('projects.explore');
Route::get('/project', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/listProjectFree', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/listProject', [ProjectController::class, 'create']);
Route::post('/listingProjectProces', [ProjectController::class, 'store'])->name('projects.store');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contactMail', [ContactController::class, 'send'])->name('contact.send');

// FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Update
Route::get('/update', [UpdateController::class, 'index'])->name('update');
Route::post('/updateDropProc', [UpdateController::class, 'updateDrop'])->name('update.drop');
Route::post('/updateProjProc', [UpdateController::class, 'updateProject'])->name('update.project');

// Collection
Route::get('/collection', [CollectionController::class, 'index'])->name('collection');

// Prices
Route::get('/prices', fn () => view('prices.index'))->name('prices');

// Promo pricing
Route::get('/promo-pricing', fn () => view('promo.pricing'))->name('promo.pricing');

// Notify (newsletter signup)
Route::post('/notifyMail', [NotifyController::class, 'store'])->name('notify.store');

// Admin
Route::get('/reviewApp', [AdminController::class, 'review'])->name('admin.review');
Route::get('/reviewAppProc', [AdminController::class, 'approveDrop'])->name('admin.approve-drop');
Route::get('/reviewAppProjectProc', [AdminController::class, 'approveProject'])->name('admin.approve-project');
Route::get('/reviewAppUpdateDrop', [AdminController::class, 'updateDropStatus'])->name('admin.update-drop-status');
Route::get('/reviewAppUpdateProject', [AdminController::class, 'updateProjectStatus'])->name('admin.update-project-status');
Route::get('/reviewDb', [AdminController::class, 'database'])->name('admin.db');
Route::post('/reviewDbProc', [AdminController::class, 'updateDatabase'])->name('admin.update-db');
Route::get('/delete', [AdminController::class, 'deleteDrop'])->name('admin.delete-drop');
Route::get('/deleteProject', [AdminController::class, 'deleteProject'])->name('admin.delete-project');
Route::get('/edit', [AdminController::class, 'edit'])->name('admin.edit');
