<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front.index');

Route::get('/mobile/scanner', function () {
    return view('mobile.scanner');
})->name('mobile.scanner');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

// Version protégée (avec auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->middleware('role:logistique');
    Route::get('/accueil', function () {
        return view('accueil');
    })->name('accueil')->middleware('role:direction');
    Route::get('/consultation-rapide', function () {
        return view('consultation-rapide');
    })->name('consultation-rapide')->middleware('role:bureau');
});

Route::middleware(['auth', 'role:logistique'])->group(function () {
    Route::resource('vehicles', App\Http\Controllers\VehicleController::class);
    Route::resource('lockers', App\Http\Controllers\LockerController::class);
    Route::resource('tyres', App\Http\Controllers\TyreController::class);
    Route::get('stock-movements', [App\Http\Controllers\StockMovementController::class, 'index'])->name('stock-movements.index');
    Route::get('stock-movements/tyre/{tyreId}', [App\Http\Controllers\StockMovementController::class, 'tyre'])->name('stock-movements.tyre');
    Route::get('lockers/{id}/qr', [App\Http\Controllers\LockerController::class, 'showQr'])->name('lockers.qr');
    
    // Routes pour les rapports
    Route::get('reports', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/stock-summary', [App\Http\Controllers\ReportController::class, 'stockSummary'])->name('reports.stock-summary');
    Route::get('reports/movement-report', [App\Http\Controllers\ReportController::class, 'movementReport'])->name('reports.movement-report');
    Route::get('reports/vehicle-report', [App\Http\Controllers\ReportController::class, 'vehicleReport'])->name('reports.vehicle-report');
    Route::get('reports/export-stock', [App\Http\Controllers\ReportController::class, 'exportStock'])->name('reports.export-stock');
    Route::get('reports/dashboard', [App\Http\Controllers\ReportController::class, 'dashboard'])->name('reports.dashboard');
});

Route::middleware(['auth', 'role:direction'])->group(function () {
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::post('users/{id}/restore', [App\Http\Controllers\UserController::class, 'restore'])->name('users.restore');
    Route::get('audits', [App\Http\Controllers\UserController::class, 'auditsIndex'])->name('audits.index');
});

Route::middleware(['auth', 'role:direction'])->prefix('admin')->group(function () {
    Route::get('contact-messages', [App\Http\Controllers\ContactMessageController::class, 'index'])->name('admin.contact_messages.index');
    Route::get('contact-messages/{id}', [App\Http\Controllers\ContactMessageController::class, 'show'])->name('admin.contact_messages.show');
    Route::delete('contact-messages/{id}', [App\Http\Controllers\ContactMessageController::class, 'destroy'])->name('admin.contact_messages.destroy');
    Route::get('contact-messages-export', [App\Http\Controllers\ContactMessageController::class, 'export'])->name('admin.contact_messages.export');
});

// Routes pour les notifications (accessibles à tous les utilisateurs authentifiés)
Route::middleware(['auth'])->group(function () {
    Route::get('notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('notifications/{id}/read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('notifications/read-all', [App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
    Route::delete('notifications/{id}', [App\Http\Controllers\NotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::get('notifications/unread-count', [App\Http\Controllers\NotificationController::class, 'getUnreadCount'])->name('notifications.unread-count');
});

// Routes profil utilisateur
Route::middleware(['auth'])->group(function () {
    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Désactiver l'inscription publique
Auth::routes(['register' => true, 'verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes Frontend
Route::view('/merci', 'front.merci')->name('front.thankyou');
Route::get('/equipe', [App\Http\Controllers\FrontController::class, 'team'])->name('front.team');
Route::get('/mentions-legales', [App\Http\Controllers\FrontController::class, 'legal'])->name('front.legal');
Route::get('/contact', [App\Http\Controllers\FrontController::class, 'contact'])->name('front.contact');
Route::get('/faq', [App\Http\Controllers\FrontController::class, 'faq'])->name('front.faq');
Route::get('/services', [App\Http\Controllers\FrontController::class, 'services'])->name('front.services');
Route::get('/temoignages', [App\Http\Controllers\FrontController::class, 'testimonials'])->name('front.testimonials');
Route::get('/blog', [App\Http\Controllers\FrontController::class, 'blog'])->name('front.blog');
Route::get('/blog/{slug}', [App\Http\Controllers\FrontController::class, 'article'])->name('front.article');
Route::get('/statistiques', [App\Http\Controllers\FrontController::class, 'statistics'])->name('front.statistics');
Route::get('/a-propos', [App\Http\Controllers\FrontController::class, 'about'])->name('front.about');
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// Routes AJAX pour dashboard logistique
Route::middleware(['auth', 'role:logistique'])->group(function () {
    Route::get('/admin/movements-table', [App\Http\Controllers\AdminController::class, 'movementsTable']);
    Route::get('/admin/movements-chart', [App\Http\Controllers\AdminController::class, 'movementsChart']);
    Route::get('/admin/movements-export', [App\Http\Controllers\AdminController::class, 'movementsExport']);
});

// Redirige SEULEMENT le GET /login vers la modale, mais garde le nom 'login' pour le POST
Route::get('/login', function() {
    return redirect('/?auth=login');
})->name('login');
Route::get('/register', function() {
    return redirect('/?auth=register');
})->name('register');
