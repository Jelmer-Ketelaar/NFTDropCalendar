<?php

use App\Http\Controllers\LegacyPageController;
use Illuminate\Support\Facades\Route;

Route::any('/', LegacyPageController::class);
Route::any('/{path}', LegacyPageController::class)->where('path', '.*');
