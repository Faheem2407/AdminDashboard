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

// update site information
Route::put('/site-infos/{id}', [AdminAPIController::class, 'updateSiteInfo']);


// platforms 
Route::get('/platforms', [AdminAPIController::class, 'platforms']);

// crete platform
Route::post('/platforms', [AdminAPIController::class, 'createPlatform']);

// update platform
Route::put('/platforms/{id}', [AdminAPIController::class, 'updatePlatform']);

// delete platform
Route::delete('/platforms/{id}', [AdminAPIController::class, 'deletePlatform']);






// cards
Route::get('/cards', [AdminAPIController::class, 'cards']);

// create card
Route::post('/cards', [AdminAPIController::class, 'createCard']);

// update card
Route::put('/cards/{id}', [AdminAPIController::class, 'updateCard']);


// card amounts
Route::get('/cards/{card}/amounts',[AdminAPIController::class, 'cardAmounts']);

// card versions
Route::get('/cards/{card}/versions',[AdminAPIController::class, 'cardVersions']);







// blogs
Route::get('/blogs', [AdminAPIController::class, 'blogs']);

// create blog
Route::post('/blogs', [AdminAPIController::class, 'createBlog']);

// update blog
Route::put('/blogs/{id}', [AdminAPIController::class, 'updateBlog']);

// delete blog
Route::delete('/blogs/{id}', [AdminAPIController::class, 'deleteBlog']);




// versions
Route::get('/versions', [AdminAPIController::class, 'versions']);

// create version
Route::post('/versions', [AdminAPIController::class, 'createVersion']);

// update version
Route::put('/versions/{id}', [AdminAPIController::class, 'updateVersion']);

// delete version
Route::delete('/versions/{id}', [AdminAPIController::class, 'deleteVersion']);

