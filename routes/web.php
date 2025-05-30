<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\UtilisateurController;

Route::get('/', function () {
    return view('accueil.index');
})->name('affiche');


Route::get('/login', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/dashboards', function () {
    return view('dashboards');
})->middleware(['auth', 'verified'])->name('dashboards');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
Route::get('creqteqccueil', [AccueilController::class, 'create']);
Route::post('store', [VoitureController::class, 'store'])->name('voiture.store');
Route::get('create', [VoitureController::class, 'create'])->name('voiture.create');
Route::post('saved', [UtilisateurController::class, 'store'])->name('Utilisateur.store');
Route::get('usve', [UtilisateurController::class, 'index'])->name('Utilisateur.index');
Route::get('list', [UtilisateurController::class, 'create'])->name('Utilisateur.create');


Route::get('paiementcreate', [PaiementController::class, 'create'])->name('paiement.create');
Route::post('savedpaiement', [PaiementController::class, 'store'])->name('paiement.store');

Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::put('locations/{location}', [LocationController::class, 'update'])->name('locations.update');
Route::get('locations/{location}', [LocationController::class, 'edit'])->name('location.edit');
Route::delete('locations/{location}', [LocationController::class, 'destroy'])->name('location.destroy');
Route::post('locationstore', [LocationController::class, 'store'])->name('location.store');
Route::get('show/{location}', [LocationController::class, 'show'])->name('location.show');
});

require __DIR__.'/auth.php';