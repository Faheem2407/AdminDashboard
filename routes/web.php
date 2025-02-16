<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\SiteInfoController;
use App\Http\Controllers\Backend\Admin\PlatformController;
use App\Http\Controllers\Backend\Admin\CardController;
use App\Http\Controllers\Backend\Admin\BlogController;
use App\Http\Controllers\Backend\Admin\AmountController;
use App\Http\Controllers\Backend\Admin\VersionController;
use App\Http\Controllers\Backend\UserController;



// admin dashboard
Route::get('/',[AdminController::class,'index'])->name('admin-dashboard');


// site information
Route::get('/site-infos',[SiteInfoController::class,'index'])->name('site-infos.index');
Route::get('/site-infos/{siteInfo}/edit', [SiteInfoController::class, 'edit'])->name('site-infos.edit');
Route::put('/site-infos/{siteInfo}', [SiteInfoController::class, 'update'])->name('site-infos.update'); // Update site info
// Route::delete('/site-infos/{siteInfo}/delete', [SiteInfoController::class, 'destroy'])->name('site-infos.delete');



// Platform Routes
Route::get('/platforms', [PlatformController::class, 'index'])->name('platforms.index'); // List all platforms
Route::get('/platforms/create', [PlatformController::class, 'create'])->name('platforms.create'); // Show create form
Route::post('/platforms', [PlatformController::class, 'store'])->name('platforms.store'); // Store a new platform
Route::get('/platforms/{platform}', [PlatformController::class, 'show'])->name('platforms.show'); // Show a single platform
Route::get('/platforms/{platform}/edit', [PlatformController::class, 'edit'])->name('platforms.edit'); // Show edit form
Route::put('/platforms/{platform}', [PlatformController::class, 'update'])->name('platforms.update'); // Update a platform
Route::delete('/platforms/{platform}', [PlatformController::class, 'destroy'])->name('platforms.destroy'); // Delete a platform



// Cards Routes
Route::get('/cards', [CardController::class, 'index'])->name('cards.index'); // List all cards
Route::get('/cards/create', [CardController::class, 'create'])->name('cards.create'); // Show create form
Route::post('/cards', [CardController::class, 'store'])->name('cards.store'); // Store a new card
Route::get('/cards/{card}', [CardController::class, 'show'])->name('cards.show'); // Show a single card
Route::get('/cards/{card}/edit', [CardController::class, 'edit'])->name('cards.edit'); // Show edit form
Route::put('/cards/{card}', [CardController::class, 'update'])->name('cards.update'); // Update a card
Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy'); // Delete a card






// Blogs Routes
// Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index'); // List all blogs
// Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create'); // Show create form
// Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store'); // Store a new blog
// Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show'); // Show a single blog
// Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit'); // Show edit form
// Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update'); // Update a blog
// Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy'); // Delete a blog

Route::resource('blogs',BlogController::class);


// Amounts Routes
// Route::get('/amounts', [AmountController::class, 'index'])->name('amounts.index'); // List all amounts
// Route::get('/amounts/create', [AmountController::class, 'create'])->name('amounts.create'); // Show create form
// Route::post('/amounts', [AmountController::class, 'store'])->name('amounts.store'); // Store a new amount
// Route::get('/amounts/{amount}', [AmountController::class, 'show'])->name('amounts.show'); // Show a single amount
// Route::get('/amounts/{amount}/edit', [AmountController::class, 'edit'])->name('amounts.edit'); // Show edit form
// Route::put('/amounts/{amount}', [AmountController::class, 'update'])->name('amounts.update'); // Update an amount
// Route::delete('/amounts/{amount}', [AmountController::class, 'destroy'])->name('amounts.destroy'); // Delete an amount

Route::resource('amounts', AmountController::class);




// Version Routes
// Route::get('/versions', [VersionController::class, 'index'])->name('versions.index'); // List all versions
// Route::get('/versions/create', [VersionController::class, 'create'])->name('versions.create'); // Show create form
// Route::post('/versions', [VersionController::class, 'store'])->name('versions.store'); // Store a new version
// Route::get('/versions/{version}', [VersionController::class, 'show'])->name('versions.show'); // Show a single version
// Route::get('/versions/{version}/edit', [VersionController::class, 'edit'])->name('versions.edit'); // Show edit form
// Route::put('/versions/{version}', [VersionController::class, 'update'])->name('versions.update'); // Update a version
// Route::delete('/versions/{version}', [VersionController::class, 'destroy'])->name('versions.destroy'); // Delete a version

Route::resource('versions', VersionController::class);



// Route::get('/users',[UserController::class,'index'])->name('users.index');

Route::resource('users', UserController::class);









// Route::get('/cards/{card}/edit', function (Card $card) {
//     $platforms = Platform::all();
//     $amounts = Amount::all();
//     return view('backend.layouts.cards.edit', compact('card', 'platforms', 'amounts'));
// })->name('cards.edit');

