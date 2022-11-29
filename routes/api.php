<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
/**
 * Setting
 * 
 * Mengubah data `settings`.
 */
Route::patch('/settings', [ SettingController::class, 'update'])->name('update.setting');

/**
 * Employee
 * 
 * Membuat data `employees`.
 */
Route::post('/employees', [EmployeeController::class, 'store']);

/**
 * Overtime
 * 
 * Membuat data `overtimes`.
 */
Route::post('/overtimes', [ OvertimeController::class, 'store']);

/**
 * Overtime Pay
 * 
 * Menampilkan hasil perhitungan dari `overtimes` yang ada pada setiap `employees`, 
 * berdasarkan bulan yang ditentukan, tanpa format pagination.
 */
Route::group(['prefix'=> 'overtime-pays'] , function (){
    Route::get('/calculate ', [OvertimeController::class, 'show']);
});

