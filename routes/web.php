<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
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

Route::get('/', [StripeController::class,'list_products']);

Route::get('/stripe/{id}', [StripeController::class,'stripe'])->name('stripe.payment');
Route::post('/stripe', [StripeController::class,'stripePost'])->name('stripe.post');

