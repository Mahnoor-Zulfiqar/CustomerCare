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
// Route::get('/', function () {
//     return view('home');
// });

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'performLogout']);
//Auth::routes();
Route::get('/view-disposition', [App\Http\Controllers\DispositionController::class, 'index'])->name('view-disposition');
Route::get('/add-disposition/{id?}', [App\Http\Controllers\DispositionController::class, 'addDisposition'])->name('add-disposition');
Route::get('/create-disposition',  [App\Http\Controllers\DispositionController::class, 'createDisposition'])->name('create-disposition');
Route::get('/disposition-edit/{id}', [App\Http\Controllers\DispositionController::class, 'editDisposition'])->name('disposition-edit');
Route::get('/update-disposition', [App\Http\Controllers\DispositionController::class, 'updateDisposition'])->name('update-disposition');
Route::get('/disposition-delete/{id}',[App\Http\Controllers\DispositionController::class, 'deleteDisposition'])->name('delete-disposition');
Route::get('/disposition-detail/{id}',  [App\Http\Controllers\DispositionController::class, 'dispositionDetail'])->name('disposition-detail');
Route::get('/view-disposition-detail', [App\Http\Controllers\DispositionController::class, 'viewDispositionDetail'])->name('view-disposition-detail');
Route::get('/add-disposition-detail',  [App\Http\Controllers\DispositionController::class, 'addDispositionDetail'])->name('add-disposition-detail');
Route::get('/disposition-detail/{id}/edit', [App\Http\Controllers\DispositionController::class, 'editDispositionDetail'])->name('edit-disposition-detail');
Route::get('/update-disposition-detail', [App\Http\Controllers\DispositionController::class, 'updateDispositionDetail'])->name('update-disposition-detail');
Route::get('/disposition-detail-delete/{id}', [App\Http\Controllers\DispositionController::class, 'deleteDispositionDetail'])->name('disposition-detail-delete');
Route::get('/view-ccd-response', [App\Http\Controllers\ResponseController::class, 'index'])->name('view-ccd-response');
Route::get('/add-response', [App\Http\Controllers\ResponseController::class, 'addResponse'])->name('add-response');
Route::post('/get-dispositions', [App\Http\Controllers\ResponseController::class, 'fetchDispositions'])->name('get-dispositions');
Route::post('/get-disposition-detail', [App\Http\Controllers\ResponseController::class, 'fetchDispositionDetail'])->name('get-disposition-detail');
Route::get('/create-response', [App\Http\Controllers\ResponseController::class, 'storeResponse'])->name('create-response');
Route::get('/ccd-responses/{id}/edit', [App\Http\Controllers\ResponseController::class, 'editResponse'])->name('edit-response');
Route::get('/update-response', [App\Http\Controllers\ResponseController::class, 'updateResponse'])->name('update-response');
Route::get('/ccd-responses/{id}/delete', [App\Http\Controllers\ResponseController::class, 'deleteResponse'])->name('delete-response');
//Route::get('/export', [App\Http\Controllers\ResponseController::class, 'exportexcel'])->name('export');
//Route::get('/pdf', [App\Http\Controllers\ResponseController::class, 'exportpdf'])->name('pdf');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/view-ccd-response/{data}',[App\Http\Controllers\ResponseController::class, 'index'])->name('filters');
Route::get('/report',[App\Http\Controllers\ReportController::class, 'index'])->name('report');
Route::get('/filter-report',[App\Http\Controllers\ReportController::class, 'showdata'])->name('filter-report');
