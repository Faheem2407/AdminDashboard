<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\API\AdminAPIController;
use App\Models\Card;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// site information 
Route::get('/site-infos', [AdminAPIController::class, 'siteInformation']);

// edit site information
Route::put('/site-infos/{siteInfo}', [AdminAPIController::class, 'updateSiteInfo']);


// platforms 
Route::get('/platforms', [AdminAPIController::class, 'platforms']);


// cards
Route::get('/cards', [AdminAPIController::class, 'cards']);


// card amounts
Route::get('/cards/{card}/amounts',[AdminAPIController::class, 'cardAmounts']);

// card versions
Route::get('/cards/{card}/versions',[AdminAPIController::class, 'cardVersions']);

// blogs
Route::get('/blogs', [AdminAPIController::class, 'blogs']);