<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});

// Routes d'authentification
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/loginSubmitte', 'login')->name('login.submit');
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/registerSubmitte', 'register')->name('register.submit');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/validation', 'validationCompte')->name('valider.compte');
    Route::post('/validation/email', 'sendValidationEmail')->name('validation.email');
    Route::get('/validation/valider', 'validateAccount')->name('validate.account');
    Route::post('/validation/sms', 'sendValidationSms')->name('validation.sms');
    Route::post('/validation/sms/valider', 'validateSmsCode')->name('validation.sms.valider');
});

// Mot de passe oublié
Route::get('/mot-de-passe-oublie', [AuthController::class, 'showForgetPasswordForm'])->name('password.request');
Route::post('/mot-de-passe-oublie', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reinitialiser-mot-de-passe/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reinitialiser-mot-de-passe', [AuthController::class, 'resetPassword'])->name('password.update');

// Route::controller(AuthController::class)->group(function () {
//     Route::get('/login', 'showLoginForm')->name('login');
//     // Route::get('/products/show', 'productShow')->name('products.show');
//     // Route::get('/cart/save', 'addToCart')->name('add.cart.save');
//     // Route::get('/cart', 'cartIndex')->name('cart.index');
//     // Route::post('/cart/delete', 'cartDeleteItem')->name('cart.delete.product');
//     // Route::get('/cart/vider', 'cartVider')->name('cart.vider');

//     // Route::get('/checkout', 'checkoutIndex')->name('checkout.index');
//     // Route::get('/checkout/confirmation', 'checkoutConfirmation')->name('payment.success');
//     // Route::get('/checkout/cancel', 'checkoutCancel')->name('payment.cancel');
//     // Route::post('/checkout/payment', 'checkoutpayment')->name('checkout.payment');

//     // Route::get('/orders', 'ordersIndex')->name('orders.index');
//     // Route::get('/orders/show', 'ordersShow')->name('orders.show');
// });


// Route::middleware('auth')->group(function () {
//     Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->name('password.request');

// Dashboard

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'showDashboard')->name('dashboard');
});





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

// // Utilisateurs
// Route::prefix('users')->group(function () {
//     Route::get('/', function () {
//         return view('users.index');
//     })->name('users.index');

//     Route::get('/create', function () {
//         return view('users.create');
//     })->name('users.create');

//     Route::get('/{id}', function ($id) {
//         return view('users.show');
//     })->name('users.show');

//     Route::get('/{id}/edit', function ($id) {
//         return view('users.edit');
//     })->name('users.edit');
// });

// // Base de connaissances
// Route::prefix('knowledge')->group(function () {
//     Route::get('/', function () {
//         return view('knowledge.index');
//     })->name('knowledge.index');

//     Route::get('/create', function () {
//         return view('knowledge.create');
//     })->name('knowledge.create');

//     Route::get('/{id}', function ($id) {
//         return view('knowledge.show');
//     })->name('knowledge.show');
// });

// // Rapports
Route::get('/reports', function () {
    return view('reports.index');
})->name('reports.index');

// // Paramètres
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

// // Faq
// Route::get('/faq', function () {
//     return view('faq.index');
// })->name('faq.index');

// // Profile
// Route::get('/profile', function () {
//     return view('profile.index');
// })->name('profile.index');
