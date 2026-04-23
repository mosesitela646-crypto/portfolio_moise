<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/', function () { return view('welcome'); });
Route::get('/contact', function () { return view('contact'); })->name('contact.form');
Route::post('/contact-envoi', [ContactController::class, 'store'])->name('contact.store');

Route::get('/admin/messages', [ContactController::class, 'index'])->name('contact.index');
Route::put('/admin/messages/{contact}', [ContactController::class, 'update'])->name('contact.update'); // Route pour modifier le texte
Route::patch('/admin/messages/{contact}/read', [ContactController::class, 'markAsRead'])->name('contact.read'); // Route pour le statut
Route::delete('/admin/messages/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');