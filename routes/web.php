<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


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



Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('index');

Route::get('/categories',[CategoryController::class,'index'])->middleware(['auth', 'verified', 'permission:crud category'])->name('categories.index');

Route::get('/categories/create',[CategoryController::class,'create'])->middleware(['auth', 'verified','permission:crud category'])->name('categories.create');

Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->middleware(['auth', 'verified','permission:crud category'])->name('categories.edit');

Route::post('/categories/',[CategoryController::class,'store'])->middleware(['auth', 'verified','permission:crud category'])->name('categories.store');

Route::put('/categories/{category}',[CategoryController::class,'update'])->middleware(['auth','verified', 'permission:crud category'])->name('categories.update');

Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->middleware(['auth','verified', 'permission:crud category'])->name('categories.destroy');

/* Rutas para Proveedores*/
Route::middleware(['auth','verified', 'permission:crud provider'])->group(function(){
    Route::get('/providers',[ProviderController::class,'index'])->name('providers.index');
    Route::get('/providers/create',[ProviderController::class,'create'])->name('providers.create');
    Route::get('/providers/{provider}',[ProviderController::class,'edit'])->name('providers.edit');
    Route::post('/providers/',[ProviderController::class,'store'])->name('providers.store');
    Route::put('/providers/{provider}',[ProviderController::class,'update'])->name('providers.update');
    Route::delete('/providers/{provider}',[ProviderController::class,'destroy'])->name('providers.destroy');
});


/* Rutas para Productos*/
Route::middleware(['auth','verified','permission:crud product'])->group(function(){
    Route::get('/products',[ProductController::class,'index'])->name('products.index');
    Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
    Route::get('/products/{product}',[ProductController::class,'edit'])->name('products.edit');
    Route::post('/products/',[ProductController::class,'store'])->name('products.store');
    Route::put('/products/{product}',[ProductController::class,'update'])->name('products.update');
    Route::delete('/products/{product}',[ProductController::class,'destroy'])->name('products.destroy');
});

/*Rutas para Compras*/

Route::middleware(['auth','verified', 'permission:crud purchase'])->group(function(){
    Route::get('/purchases',[PurchaseController::class,'index'])->name('purchases.index');
    Route::get('/purchases/create',[PurchaseController::class,'create'])->name('purchases.create');
    Route::get('/purchases/show/{purchase}',[PurchaseController::class,'show'])->name('purchases.show');
    Route::post('/purchases',[PurchaseController::class,'store'])->name('purchases.store');

});

/*Rutas para Detalle de Compras*/

Route::middleware(['auth','verified','permission:crud purchase'])->group(function(){
    Route::get('/purchaseDetail/{purchase}',[PurchaseDetailController::class,'index'])->name('purchaseDetail.index');
    Route::post('/purchaseDetail/{purchase}',[PurchaseDetailController::class,'store'])->name('PurchaseDetail.store');
    Route::delete('/purchaseDetail/{purchaseDetail}',[PurchaseDetailController::class,'destroy'])->name('purchaseDetail.destroy');
});

/*Rutas para Clientes*/

Route::middleware(['auth','verified', 'permission:crud client'])->group(function(){
    Route::get('/clients',[ClientController::class,'index'])->name('clients.index');
    Route::get('/clients/create',[ClientController::class,'create'])->name('clients.create');
    Route::get('/clients/{client}',[ClientController::class,'edit'])->name('clients.edit');
    Route::post('/clients',[ClientController::class,'store'])->name('clients.store');
    Route::put('/clients/{client}',[ClientController::class,'update'])->name('clients.update');
    Route::delete('/clients/{client}',[ClientController::class,'destroy'])->name('clients.destroy');
});

/*Rutas para Ventas*/

Route::middleware(['auth','verified', 'permission:crud sale'])->group(function(){
    Route::get('sales',[SaleController::class,'index'])->name('sales.index');
    Route::get('sales/create',[SaleController::class,'create'])->name('sales.create');
    Route::post('sales/',[SaleController::class,'store'])->name('sales.store');
    Route::get('sales/show/{sale}',[SaleController::class,'show'])->name('sales.show');
});

/*Rutas para Detalle de Ventas*/
Route::middleware(['auth','verified','permission:crud sale'])->group(function(){
    Route::get('saleDetails/{sale}',[SaleDetailController::class,'index'])->name('saleDetails.index');
    Route::get('saleDetails/create/{sale}',[SaleDetailController::class,'create'])->name('saleDetails.create');
    Route::post('saleDetails/{sale}',[SaleDetailController::class,'store'])->name('saleDetails.store');
    Route::delete('saleDetails/{saleDetail}',[SaleDetailController::class,'destroy'])->name('saleDetails.destroy');
});

/*Rutas para Usuarios*/
Route::middleware(['auth','verified', 'permission:crud user'])->group(function(){
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/create',[UserController::class,'create'])->name('users.create');
    Route::post('/users/',[UserController::class,'store'])->name('users.store');
    Route::get('/users/{user}',[UserController::class,'edit'])->name('users.edit');
    Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::any('/logout', [AuthController::class, 'logout'])->name('logout');


require __DIR__.'/auth.php';
