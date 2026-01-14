<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// About page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

// Static service pages (for the 5 specific services)
Route::get('/services/3cx-phone-systems', function () {
    return view('frontend.pages.services.3cx-phone-systems');
})->name('services.3cx-phone-systems');

Route::get('/services/lan-wan-solutions', function () {
    return view('frontend.pages.services.lan-wan-solutions');
})->name('services.lan-wan-solutions');

Route::get('/services/telephone-management', function () {
    return view('frontend.pages.services.telephone-management');
})->name('services.telephone-management');

Route::get('/services/consultancy-services', function () {
    return view('frontend.pages.services.consultancy-services');
})->name('services.consultancy-services');

Route::get('/services/ict-solutions', function () {
    return view('frontend.pages.services.ict-solutions');
})->name('services.ict-solutions');

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');

// Clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Blog/News
Route::get('/news', [BlogController::class, 'index'])->name('blog.index');
Route::get('/news/{blogPost:slug}', [BlogController::class, 'show'])->name('blog.show');
