<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



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
    return redirect('/inicio');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/paquetes', function () {
    return view('paquetes');
})->name('paquetes');

Route::get('/detalles', function () {
    return view('detalles');
})->name('detalles');

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/agregartour', function () {
    return view('agregartour');
})->name('agregartour');

Route::get('/carrito', function () {
    return view('carrito');
})->name('carrito');

Route::get('/checkout/success', function() {
    return view('checkout-success');
})->name('checkout.success');

route::get('/login', function () {  
      return view('auth.login');
})->name('login');

// Ruta para la vista de registro
Route::get('/register', function () {
    return view('auth.register');
})->name('register');


// Ruta para procesar el registro
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);



// Ruta para la página de inicio que muestra los paquetes
Route::get('/inicio', [TourController::class, 'index'])->name('inicio');
Route::get('/paquetes', [TourController::class, 'index1'])->name('paquetes');

// Ruta para mostrar los detalles de un tour
Route::get('/tours/{id}', [TourController::class, 'show'])->name('tours.show');

// Rutas para agregar un tour
Route::get('/tours/create', [TourController::class, 'create'])->name('tours.create');
Route::post('/tours', [TourController::class, 'store'])->name('tours.store');

//ruta ver tour en detalles
Route::get('/detalles/{id}', [TourController::class, 'show'])->name('detalles.show');

//ruta carrrito
route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
Route::get('/checkout/monthly', [PaymentController::class, 'monthlyPayment'])->name('checkout.monthly');

//registro
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
Auth::routes();

//carro
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->middleware('auth')->name('cart.add');
Route::post('/payment/process/monthly', [PaymentController::class, 'processMonthlyPayment'])->name('payment.process.monthly');
//ruta busqueda

route::post('/search-tours', [TourController::class, 'search'])->name('search-tours');