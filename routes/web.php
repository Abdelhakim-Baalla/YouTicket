<?php

use Illuminate\Support\Facades\Route;

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

// Page d'accueil
Route::get('/', function () {
    return view('auth.login');
});

// Routes d'authentification
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Tickets
Route::prefix('tickets')->group(function () {
    Route::get('/', function () {
        return view('tickets.index');
    })->name('tickets.index');
    
    Route::get('/create', function () {
        return view('tickets.create');
    })->name('tickets.create');
    
    Route::get('/{id}', function ($id) {
        return view('tickets.show');
    })->name('tickets.show');
    
    Route::get('/{id}/edit', function ($id) {
        return view('tickets.edit');
    })->name('tickets.edit');
});

// Utilisateurs
Route::prefix('users')->group(function () {
    Route::get('/', function () {
        return view('users.index');
    })->name('users.index');
    
    Route::get('/create', function () {
        return view('users.create');
    })->name('users.create');
    
    Route::get('/{id}', function ($id) {
        return view('users.show');
    })->name('users.show');
    
    Route::get('/{id}/edit', function ($id) {
        return view('users.edit');
    })->name('users.edit');
});

// Base de connaissances
Route::prefix('knowledge')->group(function () {
    Route::get('/', function () {
        return view('knowledge.index');
    })->name('knowledge.index');
    
    Route::get('/create', function () {
        return view('knowledge.create');
    })->name('knowledge.create');
    
    Route::get('/{id}', function ($id) {
        return view('knowledge.show');
    })->name('knowledge.show');
});

// Rapports
Route::get('/reports', function () {
    return view('reports.index');
})->name('reports.index');

// Paramètres
Route::prefix('settings')->group(function () {
    Route::get('/', function () {
        return view('settings.index');
    })->name('settings.index');
    
    Route::get('/notifications', function () {
        return view('settings.notifications');
    })->name('settings.notifications');
    
    Route::get('/integrations', function () {
        return view('settings.integrations');
    })->name('settings.integrations');

    Route::get('/email', function () {
        return view('settings.email');
    })->name('settings.email');

    Route::get('/security', function () {
        return view('settings.security');
    })->name('settings.security');

    Route::get('/appearance', function () {
        return view('settings.appearance');
    })->name('settings.appearance');

     Route::get('/language', function () {
        return view('settings.language');
    })->name('settings.language');

     Route::get('/backup', function () {
        return view('settings.backup');
    })->name('settings.backup');
});

// Faq
Route::get('/faq', function () {
    return view('faq.index');
})->name('faq.index');

// Profile
Route::get('/profile', function () {
    return view('profile.index');
})->name('profile.index');
