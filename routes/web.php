<?php

use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LowonganKerjaController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\LandingController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LandingController::class,'index']);

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function(){
    Route::get('/home', [DashboardController::class,'index'])->name('dashboard.home');
    // Route::get('/infoloker', [DashboardController::class,'index'])->name('dashboard.infoloker');
    Route::resource('/infoloker', LowonganKerjaController::class);
    Route::resource('/role', RoleController::class);
});
