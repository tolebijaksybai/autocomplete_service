<?php

use App\Http\Controllers\Api\V1\AirportController;
use Illuminate\Support\Facades\Route;

Route::get('/airports/search', [AirportController::class, 'search'])->name('api.airports.search');
