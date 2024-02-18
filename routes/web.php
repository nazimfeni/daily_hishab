<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController ;
use App\Http\Controllers\SupplierController;
use App\Http\Middleware\DisableAuthCaching;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HisabController;


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

/*Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
*/

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::group(['middleware' => ['web', DisableAuthCaching::class]], function () {
    Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('login', [CustomAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
    Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
    Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


    Route::resource('product', ProductController::class)->except(['show'])->names([
        'index' => 'product.index',
        'create' => 'product.create',
        'store' => 'product.store',
        'edit' => 'product.edit',
        'update' => 'product.update',
        'destroy' => 'product.destroy',
    ]);
    Route::resource('supplier', SupplierController::class)
        ->except(['show'])
        ->names([
            'index' => 'supplier.index',
            'create' => 'supplier.create',
            'store' => 'supplier.store',
            'edit' => 'supplier.edit',
            'update' => 'supplier.update',
            'destroy' => 'supplier.destroy',
        ]);

 
Route::resource('categories', CategoryController::class)->only([
    'index', 'create', 'store'
])->names([
    'index' => 'categories.index',
    'create' => 'categories.create',
    'store' => 'categories.store',
]);

Route::resource('customers', CustomerController::class)->only(['index', 'create', 'store', 'edit','update'])->names([
    'index' => 'customer.index',
    'create' => 'customer.create',
    'store' => 'customer.store',
    'edit' => 'customer.edit',
    'update' => 'customer.update',
]);

Route::resource('hisabs', HisabController::class)->only(['index', 'create', 'store', 'edit','update'])->names([
    'index' => 'hisab.index',
    'create' => 'hisab.create',
    'store' => 'hisab.store',
    'edit' => 'hisab.edit',
    'update' => 'hisab.update',
    
]);

    
});




