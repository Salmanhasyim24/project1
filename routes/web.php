<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\TravelController;
use App\Http\Controllers\Backend\MultiImgController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Frontend\DetailController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\Travel;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');


Route::middleware(['auth', 'verified'])->group(function(){    

Route::post('/checkout/{id}', [CheckoutController::class, 'process'])
    ->name('checkout_process');
    
Route::get('/checkout/{id}', [CheckoutController::class, 'index'])
    ->name('checkout');
  

Route::post('/checkout/create/{detail_id}', [CheckoutController::class, 'create'])
    ->name('checkout-create');


Route::get('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])
    ->name('checkout-remove');
  

Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])
    ->name('checkout-success');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');   
    Route::get('/logout', [ AdminController::class, 'adminlogout'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

}); 
// admin login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function(){
    Route::controller(TravelController::class)->group(function(){
        Route::get('/all/travel' , 'index')->name('travel.index');
        Route::get('/add/travel' , 'create')->name('travel.create');
        Route::post('/store/travel' , 'store')->name('travel.store');
        Route::get('/edit/travel/{id}' , 'edit')->name('travel.edit');
        Route::post('/update/travel' , 'update')->name('travel.update');
        Route::get('/delete/travel/{id}' , 'destroy')->name('travel.destroy');

    });
    //MultiImg All Route
      Route::controller(MultiImgController::class)->group(function(){
        Route::get('/all/image' , 'index')->name('image.index');
        Route::get('/add/image' , 'create')->name('image.create');
        Route::post('/store/image' , 'store')->name('image.store');
        Route::get('/edit/image/{id}' , 'edit')->name('image.edit');
        Route::post('/update/image' , 'update')->name('image.update');
        Route::get('/delete/image/{id}' , 'destroy')->name('image.destroy');

    });
    //Transaction All Route
      Route::controller(TransactionController::class)->group(function(){
        Route::get('/all/transaction' , 'index')->name('transaction.index');
        Route::get('/add/transaction' , 'create')->name('transaction.create');
        Route::get('/detail/transaction{id}' , 'show')->name('transaction.show');
        Route::post('/store/transaction' , 'store')->name('transaction.store');
        Route::get('/edit/transaction/{id}' , 'edit')->name('transaction.edit');
        Route::post('/update/transaction{id}' , 'update')->name('transaction.update');
        Route::get('/delete/transaction/{id}' , 'destroy')->name('transaction.destroy');

    });
});

require __DIR__.'/auth.php';

