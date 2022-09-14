<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('App\Http\Livewire\About')->group(function ()
{
    Route::get('/', Index::class)->name('about');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function ()
{

    Route::namespace('App\Http\Livewire\Dashboard')->group(function ()
    {
        Route::get('/dashboard', Index::class)->name('dashboard');
    });

    Route::namespace('App\Http\Livewire\Room')->group(function ()
    {
        Route::name('rooms.')->group(function ()
        {
            Route::prefix('/rooms')->group(function ()
            {
                Route::get('/', Index::class)->name('index');
                Route::get('/create', Index::class)->name('create');
                Route::get('/edit', Index::class)->name('edit');
            });
        });
    });

    Route::namespace('App\Http\Livewire\User')->group(function ()
    {
        Route::name('users.')->group(function ()
        {
            Route::prefix('/users')->group(function ()
            {
                Route::get('/', Index::class)->name('index');
                Route::get('/create', Index::class)->name('create');
                Route::get('/edit', Index::class)->name('edit');
            });
        });
    });

});
