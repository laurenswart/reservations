<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    //Afficher le formulaire de paiement
    Route::post('reservations/checkout', [ReservationController::class, 'checkout'])
        ->name('reservations_checkout');
    //Cr??er la r??servation une fois le paiment re??u
    Route::get('reservations/process', [ReservationController::class, 'processPayment'])
        ->name('reservations_processPayment');
    //Afficher les r??servations du user authentifi??
    Route::get('reservations/all', [ReservationController::class, 'forUser'])
        ->name('reservations_forUser');

    //Afficher les donn??es de compte de l'utilisateur authentifi??
    Route::get('account', [UserController::class, 'account'])
        ->name('user_account');
    //Afficher le formulaire de modification donn??es perso
    Route::get('account/edit', [UserController::class, 'edit'])
        ->name('user_edit');
    //Modifier donn??es perso en db
    Route::put('account/update', [UserController::class, 'update'])
        ->name('user_update');
    Route::get('/account/delete', [UserController::class, 'confirmDelete'])
        ->name('account_confirmDelete');
    Route::post('/account/delete', [UserController::class, 'delete'])
        ->name('account_delete');
});
