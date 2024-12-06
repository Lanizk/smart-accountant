<?php
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [OnboardingController::class, 'showRegisterView']);
Route::post('/register',[OnboardingController::class,'register'])->name('organization.register.submit');

Route::get('/', [OnboardingController::class, 'login']);


Route::group(['domain'=>'{subdomain}.localhost'],function(){
    Route::get('/dashboard',[DashboardController::class,'showDashboard']);
});
