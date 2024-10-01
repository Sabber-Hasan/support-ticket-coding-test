<?php

use App\Http\Controllers\Admin as ControllersAdmin;
use App\Http\Controllers\Customer as ControllersCustomer;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Customer;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->intended(route('admin', absolute: false));
    }
    if (Auth::user()->role === 'customer') {
        return redirect()->intended(route('customer', absolute: false));
    }
})->middleware(['auth'])->name('dashboard');
 
Route::middleware(Admin::class)->group(function () {
    Route::get('/admindashboard',[ControllersAdmin ::class, 'index'])->name('admin');
    Route::resource('/admindashboard/user', ControllersAdmin::class);
});
Route::middleware(Customer::class)->group(function () {
    Route::get('/customerdashboard', [ControllersCustomer::class, 'index'])->name('customer');
    Route::get('/customerdashboard/ticket', [ControllersCustomer::class, 'ticket'])->name('ticket');
    Route::get('/customerdashboard/status', [ControllersCustomer::class, 'status'])->name('status');
    Route::post('/customerdashboard/ticket', [ControllersCustomer::class, 'store'])->name('ticket.store');});
require __DIR__.'/auth.php';
