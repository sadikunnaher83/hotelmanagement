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

Route::get('/roomupdate/{id}', [BackendController::class, 'roomupdate']);
Route::put('/roomupdate/{id}', [BackendController::class, 'roomupdateSubmit']);
Route::get('/bookings', [BackendController::class, 'bookings']);
Route::get('/bookingdelete/{id}', [BackendController::class, 'bookingdelete']);
Route::get('/approvebook/{id}', [BackendController::class, 'approvebook']);
Route::get('/rejected/{id}', [BackendController::class, 'rejected']);
Route::get('/viewgalary', [BackendController::class, 'viewgalary']);
Route::post('/uploadgalary', [BackendController::class, 'uploadgalary']);
Route::get('/deletegallary/{id}', [BackendController::class, 'deletegallary']);
Route::get('/allmessages', [BackendController::class, 'allmessages']);
Route::get('/sendmail/{id}', [BackendController::class, 'sendmail']);
Route::get('/mail/{id}', [BackendController::class, 'mail']);



Route::get('/roomdetails/{id}', [FrontendController::class, 'roomdetails']);
Route::post('/addbooking/{id}', [FrontendController::class, 'addbooking']);
Route::post('/contact', [FrontendController::class, 'contact']);

Route::get('/ourrooms', [FrontendController::class, 'ourroom']);
Route::get('/hotelgallery', [FrontendController::class, 'hotelgallery']);
Route::get('/ourabout', [FrontendController::class, 'ourabout']);
Route::get('/ourblogs', [FrontendController::class, 'ourblogs']);
Route::get('/ourcontacts', [FrontendController::class, 'ourcontact']);



