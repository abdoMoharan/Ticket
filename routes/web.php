<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageAlbumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth', 'verified'],'prefix' => 'admin', 'as' => 'admin.'],function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('/tickets',TicketController::class);
    Route::post('tickets/change_status',[TicketController::class,'changeStatus'])->name('tickets.change_status');
    Route::controller(ReplyController::class)->group(function(){
        Route::get('/reply','index')->name('reply.index');
        Route::get('/reply/create','create')->name('reply.create');
        Route::post('/reply','store')->name('reply.store');
        Route::delete('/reply/{reply}','destroy')->name('reply.destroy');
    });

});
require __DIR__.'/auth.php';
