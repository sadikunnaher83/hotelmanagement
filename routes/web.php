<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [FrontendController::class, 'index'])->name('home');
Route::get('backend', [BackendController::class, 'index'])->name('admin');
Route::get('createroom', [BackendController::class, 'createroom'])->name('admin.createroom');
Route::post('addroom', [BackendController::class, 'addroom']);
Route::get('viewroom', [BackendController::class, 'viewroom'])->name('viewroom');
Route::get('roomdelete/{id}', [BackendController::class, 'roomdelete']);

Route::get('/roomupdate/{id}', [BackendController::class, 'roomupdate']); // ফর্ম দেখানোর জন্য
Route::put('/roomupdate/{id}', [BackendController::class, 'roomupdateSubmit']); // ফর্ম সাবমিট হ্যান্ডেল করার জন্য

