<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserActionHistoryController;
use App\Http\Controllers\UtilisateurController;
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
    Route::post('/profile/change/password', 'updateProfileChangePassword')->name('profile.change_password');
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

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'showAdminDashboard')->name('dashboard.admin');
    // Admin Utilisateurs
    Route::get('/admin/utilisateurs', 'showAdminDashboardUtilisateurs')->name('dashboard.admin.utilisateurs');
    Route::get('/admin/utilisateurs/cree', 'showAdminDashboardUtilisateursCreateModal')->name('dashboard.admin.utilisateurs.create');
    Route::post('/admin/utilisateurs/cree/submit', 'AdminCreeUtilisateur')->name('dashboard.admin.utilisateurs.create.submit');
    Route::get('/admin/utilisateurs/modifier', 'showAdminDashboardUtilisateursEditModal')->name('dashboard.admin.utilisateurs.edit');
    Route::put('/admin/utilisateurs/modifier/submit', 'AdminModifierUtilisateur')->name('dashboard.admin.utilisateurs.edit.submit');
    Route::delete('/admin/utilisateurs/delete/{id}', 'AdminSupprimerUtilisateur')->name('dashboard.admin.utilisateurs.delete');

    // Admin Equipes
    Route::get('/admin/equipes', 'showAdminDashboardEquipes')->name('dashboard.admin.equipes');
    Route::get('/admin/equipes/create', 'createEquipe')->name('dashboard.admin.equipes.create');
    Route::get('/admin/equipes/{id}', 'showEquipe')->name('dashboard.admin.equipes.show');
    Route::get('/admin/equipes/{id}/edit', 'editEquipe')->name('dashboard.admin.equipes.edit');
    Route::put('/admin/equipes/{id}', 'updateEquipe')->name('dashboard.admin.equipes.update');
    Route::post('/admin/equipes', 'storeEquipe')->name('dashboard.admin.equipes.store');
    Route::delete('/admin/equipes/{id}/supprimer', 'equipeSupprimer')->name('dashboard.admin.equipes.delete');
});

Route::controller(AgentController::class)->group(function () {
    Route::get('/agent', 'showAgentDashboard')->name('dashboard.agent');
    // Route::get('/agent/utilisateurs', 'showAdminDashboardUtilisateurs')->name('dashboard.admin.utilisateurs');
    // Route::get('/agent/utilisateurs/cree', 'showAdminDashboardUtilisateursCreateModal')->name('dashboard.admin.utilisateurs.create');
    // Route::post('/admin/utilisateurs/cree/submit', 'AdminCreeUtilisateur')->name('dashboard.admin.utilisateurs.create.submit');
    // Route::get('/admin/utilisateurs/modifier', 'showAdminDashboardUtilisateursEditModal')->name('dashboard.admin.utilisateurs.edit');
    // Route::put('/admin/utilisateurs/modifier/submit', 'AdminModifierUtilisateur')->name('dashboard.admin.utilisateurs.edit.submit');
});

Route::controller(UtilisateurController::class)->group(function () {
    Route::get('/client', 'showUtilisateurDashboard')->name('dashboard.utilisateur');
    Route::get('/client/tickets', 'showUtilisateurTickets')->name('dashboard.utilisateur.tickets');
    Route::get('/client/ticket/show/{id}', 'showTicket')->name('dashboard.utilisateur.ticket.show');
    Route::post('/client/ticket/show/{id}/comment/store', 'showTicketCommentStore')->name('dashboard.utilisateur.ticket.show.comment.store');
    Route::get('/client/tickets/create', 'showUtilisateurTicketsCreateModal')->name('dashboard.utilisateur.tickets.create');
    Route::post('/client/tickets/create/store', 'utilisateurStoreCreateTickets')->name('dashboard.utilisateur.tickets.create.store');
    Route::get('/client/tickets/edit/{id}', 'showUtilisateurTicketsEditModal')->name('dashboard.utilisateur.tickets.edit');
    Route::put('/client/tickets/edit/store/{id}', 'utilisateurStoreEditTickets')->name('dashboard.utilisateur.tickets.edit.store');
    Route::get('/client/ticket/{ticket}/supprimer/pieceJointe/{pieceJointe}', 'utilisateurTicketsSupprimmerPieceJointe')->name('dashboard.utilisateur.tickets.pieces-jointes.supprimer');
    Route::delete('/client/ticket/delete/{id}', 'utilisateurDeleteTicket')->name('dashboard.utilisateur.ticket.delete');
    Route::get('/client/notifications/redirect', 'utilisateurNotificationsRedirect')->name('dashboard.utilisateur.notifications.redirect');
});





Route::middleware(['auth'])->group(function () {
    Route::get('/admin/histories', [UserActionHistoryController::class, 'index'])->name('histories.index');
    Route::get('/admin/histories/{history}', [UserActionHistoryController::class, 'show'])->name('histories.show');
});


// Errors

Route::get('/403', function () {
    return view('errors.403');
})->name('error.403');
Route::get('/404', function () {
    return view('errors.404');
})->name('error.404');
Route::get('/500', function () {
    return view('errors.500');
})->name('error.500');

Route::fallback(function () {
    return redirect('/404');
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

Route::middleware('auth')->group(function () {
    // Route::get('/profil/edition', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profil/edition', [AuthController::class, 'updateProfile'])->name('profile.update');
});
