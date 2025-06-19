<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ReportController;
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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/issues', [IssueController::class, 'index'])->name('issues.index')->middleware('auth');
Route::get('/report-issue', [IssueController::class, 'create'])->name('issue.create');
Route::post('/report-issue', [IssueController::class, 'store'])->name('issue.store');
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show')->middleware('auth');
Route::post('/issues/{id}/status', [IssueController::class, 'updateStatus'])->name('issues.updateStatus');
Route::get('/admin/issues', [IssueController::class, 'adminIndex'])->name('issues.admin');
// Regular user report
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

// Admin report
Route::get('/admin/reports', [ReportController::class, 'adminIndex'])->name('reports.admin');
