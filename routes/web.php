<?php

use App\Http\Controllers\CarBookingController;
use App\Http\Controllers\CarListingController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;
use App\Providers\AppServiceProvider;
use App\Http\Controllers\LocaleController;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/',[SiteController::class,'index'])->name('index');
Route::get('/terms-and-conditions',[SiteController::class,'TermsConditions'])->name('pages.terms-conditions');
Route::get('/contact-us',[SiteController::class,'Contact'])->name('pages.contact-us');

Route::get('/car-booking',[CarBookingController::class,'CarBooking'])->name('pages.car-booking');
Route::get('/my-booking',[CarBookingController::class,'MyBooking'])->name('pages.my-booking');
Route::get('/enquiry',[EnquiryController::class,'index'])->name('pages.enquiry');
Route::get('/carlist',[CarListingController::class,'carlist'])->name('pages.carlist');
Route::get('/about-us',[SiteController::class,'AboutUs'])->name('pages.about-us');
Route::get('/feedback',[SiteController::class,'feedback'])->name('pages.feedback');

// Route::get('/set-locale/{lang}', function($lang) {
//     session(['locale' => $lang]);
//     return response('OK', 200);
// });
// Route::get('/set-locale/{lang}', function ($lang) {
//     session(['locale' => $lang]);
//     app()->setLocale($lang);
//     return redirect()->back();
// });

Route::post('/set-locale', [LocaleController::class, 'setLocale'])
    ->name('set-locale');
// Optionally allow GET too for simple redirects
Route::get('/set-locale/{locale}', [LocaleController::class, 'setLocaleRedirect']);

