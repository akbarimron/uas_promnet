<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FAQController;

// Landing Page
Route::get('/', function () {
    $goalsController = new PageController();
    $goals = $goalsController->getGoals();
    $faqController = new PageController();
    $faqs = $faqController->getFAQ();
    return view('landingpage', compact('goals', 'faqs'));
})->name('home');

// Gallery Page with JSON data
Route::get('/gallery', function () {
    $pageController = new PageController();
    $galleries = $pageController->getGalleries();
    $faqController = new PageController();
    $faqs = $faqController->getFAQ();
    return view('page.gallery', compact('galleries', 'faqs'));
})->name('gallery');

// Store Page with JSON data
Route::get('/store', function () {
    $pageController = new PageController();
    $stores = $pageController->getStores();
    $faqController = new PageController();
    $faqs = $faqController->getFAQ();
    return view('page.store', compact('stores', 'faqs'));
})->name('store');

//terms page
Route::get('/terms', function () {   
    return view('page.terms');
})->name('terms');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected Routes - Dashboard
Route::middleware('auth')->group(function () {
    // User Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.user');
    })->name('user.dashboard');
});

// Admin Routes - Protected with admin middleware
Route::middleware(['auth', 'admin:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.admin');
    })->name('dashboard');
    
 
});