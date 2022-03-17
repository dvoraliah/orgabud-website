<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YearController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\MonthController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\FieldCategoryController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/* Route pour les modifications des valeurs de la table budgets = les montants associés au champs par utilisateur*/
Route::controller(BudgetController::class)->group(function(){
    Route::Post('budgets', 'store')->name('budgets.store');
    Route::get('budgets', 'index')->name('budgets.index');
    Route::get('budgets/{budget}', 'show')->name('budgets.show');
    Route::put('budgets/{budget}', 'update')->name('budgets.update');
    Route::delete('budgets/{budget}', 'destroy')->name('budgets.destroy');
});

/* Route pour les modifications des valeurs de la table years */
Route::controller(YearController::class)->group(function () {
    Route::Post('years', 'store')->name('years.store');
    Route::get('years', 'index')->name('years.index');
    Route::get('years/{year}', 'show')->name('years.show');
    Route::put('years/{year}', 'update')->name('years.update');
    Route::delete('years/{year}', 'destroy')->name('years.destroy');
});

/* Route pour les modifications des valeurs de la table months */
Route::controller(MonthController::class)->group(function () {
    Route::Post('months', 'store')->name('months.store');
    Route::get('months', 'index')->name('months.index');
    Route::get('months/{month}', 'show')->name('months.show');
    Route::put('months/{year}', 'update')->name('months.update');
    Route::delete('months/{year}', 'destroy')->name('months.destroy');
});


/* Route pour les modifications des valeurs de la table field_categories */
Route::controller(FieldCategoryController::class)->group(function () {
    Route::Post('categories', 'store')->name('categories.store');
    Route::get('categories', 'index')->name('categories.index');
    Route::get('categories/{category}', 'show')->name('categories.show');
    Route::put('categories/{category}', 'update')->name('categories.update');
    Route::delete('categories/{category}', 'destroy')->name('categories.destroy');
});

/* Route pour les modifications des valeurs de la table fields */
Route::controller(FieldController::class)->group(function () {
    Route::Post('fields', 'store')->name('fields.store');
    Route::get('fields', 'index')->name('fields.index');
    Route::get('fields/{field}', 'show')->name('fields.show');
    Route::put('fields/{field}', 'update')->name('fields.update');
    Route::delete('fields/{field}', 'destroy')->name('fields.destroy');
});

/* Route pour les modifications des valeurs de la table status : les status qui détermine les permissions des utilisateurs */
Route::controller(StatusController::class)->group(function () {
    Route::Post('status', 'store')->name('status.store');
    Route::get('status', 'index')->name('status.index');
    Route::get('status/{status}', 'show')->name('status.show');
    Route::put('status/{status}', 'update')->name('status.update');
    Route::delete('status/{status}', 'destroy')->name('status.destroy');
});

/* Route pour les modifications des valeurs de la table users : les utilisateurs */
Route::controller(UserController::class)->group(function () {
    Route::Post('users', 'store')->name('users.store');
    Route::get('users', 'index')->name('users.index');
    Route::get('users/{user}', 'show')->name('users.show');
    Route::put('users/{user}', 'update')->name('users.update');
    Route::delete('users/{user}', 'destroy')->name('users.destroy');
});

// Route::resource('BudgetController', BudgetController::class);
// Route::resource('YearController', YearController::class);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
