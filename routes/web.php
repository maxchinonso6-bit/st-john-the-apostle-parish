<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ReflectionController;
use App\Http\Controllers\ActivitiesScheduleController;
use App\Http\Controllers\MassBookingController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CatechistController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/activities', [OrganisationController::class, 'activities'])->name('activities');
Route::get('/pious-organisations', [OrganisationController::class, 'pious'])->name('pious');
Route::get('/organisations/{organisation}', [OrganisationController::class, 'show'])->name('organisations.show');

Route::get('/buildings', [BuildingController::class, 'index'])->name('buildings');

Route::get('/catechists', [CatechistController::class, 'index'])->name('catechists');

Route::get('/school', [SchoolController::class, 'index'])->name('school');
Route::post('/school/enroll', [SchoolController::class, 'storeInquiry'])->name('school.enroll');

Route::get('/reflections', [ReflectionController::class, 'index'])->name('reflections');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{album}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/mass-schedule', [ActivitiesScheduleController::class, 'index'])->name('mass-schedule');

Route::get('/mass-booking', [MassBookingController::class, 'create'])->name('mass-booking.create');
Route::post('/mass-booking', [MassBookingController::class, 'store'])->name('mass-booking.store');

Route::get('/donations', [DonationController::class, 'index'])->name('donations');
Route::get('/donations/{donationProject}', [DonationController::class, 'show'])->name('donations.show');
Route::post('/donations/{donationProject}', [DonationController::class, 'store'])->name('donations.store');

Route::get('/zones', [ZoneController::class, 'index'])->name('zones');
Route::get('/zones/{zone}', [ZoneController::class, 'show'])->name('zones.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/debug-env', function () {
    return [
        'APP_URL_config' => config('app.url'),
        'APP_URL_env' => env('APP_URL'),
        'asset_example' => asset('css/app.css'),
    ];
});