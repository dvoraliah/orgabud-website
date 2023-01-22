<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\FieldCategoryController;

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

/* Route d'authentification */

// Route::get('/test', [UserController::class, 'index'])->name('years.index');
Route::controller(AuthController::class)->group(function(){
    Route::Post('register', 'register')->name('auth.register');
    Route::Post('login', 'login')->name('auth.login');
    Route::Post('isRegister', 'isRegister')->name('auth.isRegister');
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('logout', 'logout')->name('auth.logout');
    });
});

// Route::controller(FieldCategoryController::class)->group(function () {
//     Route::Post('categories', 'store')->name('categories.store')->middleware('role:Admin');
//     Route::get('categories', 'index')->name('categories.index');
//     Route::get('categories/{category}', 'show')->name('categories.show');
//     Route::put('categories/{category}', 'update')->name('categories.update')->middleware('role:Admin');
//     Route::delete('categories/{category}', 'destroy')->name('categories.destroy')->middleware('role:Admin');

// });

// Route::controller(FieldController::class)->group(function () {
//     Route::Post('fields', 'store')->name('fields.store')->middleware('role:Admin');
//     Route::get('fields', 'index')->name('fields.index');
//     Route::get('{category}/fields', 'fieldsByCategory')->name('fields.category');
//     Route::get('fields/{field}', 'show')->name('fields.show');
//     Route::put('fields/{field}', 'update')->name('fields.update')->middleware('role:Admin');
//     Route::delete('fields/{field}', 'destroy')->name('fields.destroy')->middleware('role:Admin');
// });

// Route::controller(BudgetController::class)->group(function () {
//     Route::Post('budgets', 'store')->name('budgets.store');
//     Route::get('budgets', 'index')->name('budgets.index');
//     Route::get('budgets/{budget}', 'show')->name('budgets.show');
//     Route::get('budgets/filter/{filter}', 'filter')->name('budgets.filter');
//     Route::put('budgets/{budget}', 'update')->name('budgets.update');
//     Route::delete('budgets/{budget}', 'destroy')->name('budgets.destroy');
// });



//Routes qui nécessitent une authentification : 
//Routes uniquement pour user et premium    
Route::group(['middleware' => ['auth:sanctum']], function () {
    /* Route pour les modifications des valeurs de la table budgets = les montants associés au champs par utilisateur*/
    Route::controller(BudgetController::class)->group(function(){
        Route::Post('budgets', 'store')->name('budgets.store');
        Route::get('budgets', 'index')->name('budgets.index');
        Route::get('budgets/{budget}', 'show')->name('budgets.show');
        Route::get('budgets/filter/{filter}', 'filter')->name('budgets.filter');
        Route::put('budgets/{budget}', 'update')->name('budgets.update');
        Route::delete('budgets/{budget}', 'destroy')->name('budgets.destroy');
    });



    /* Route pour les modifications des valeurs de la table field_categories */
    Route::controller(FieldCategoryController::class)->group(function () {
        Route::Post('categories', 'store')->name('categories.store')->middleware('role:Admin');
        Route::get('categories', 'index')->name('categories.index');
        Route::get('categories/{category}', 'show')->name('categories.show');
        Route::put('categories/{category}', 'update')->name('categories.update')->middleware('role:Admin');
        Route::delete('categories/{category}', 'destroy')->name('categories.destroy')->middleware('role:Admin');
    });

    /* Route pour les modifications des valeurs de la table fields */
    Route::controller(FieldController::class)->group(function () {
        Route::Post('fields', 'store')->name('fields.store')->middleware('role:Admin');
        Route::get('fields', 'index')->name('fields.index');
        Route::get('fields/{field}', 'show')->name('fields.show');
        Route::put('fields/{field}', 'update')->name('fields.update')->middleware('role:Admin');
        Route::delete('fields/{field}', 'destroy')->name('fields.destroy')->middleware('role:Admin');
    });

    // /* Route pour les modifications des valeurs de la table status : les status qui détermine les permissions des utilisateurs */
    Route::controller(StatusController::class)->group(function () {
        Route::get('status', 'index')->name('status.index');
        Route::Post('status', 'store')->name('status.store')->middleware('role:Admin');
        Route::get('status/{status}', 'show')->name('status.show')/* ->middleware('role:Admin') */;
        Route::put('status/{status}', 'update')->name('status.update')->middleware('role:Admin');
        Route::delete('status/{status}', 'destroy')->name('status.destroy')->middleware('role:Admin');
    });

    /* Route pour les modifications des valeurs de la table users : les utilisateurs */
    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('users.index')->middleware('role:Admin');   
        Route::get('users/{user}', 'show')->name('users.show');
        Route::put('users/{user}', 'update')->name('users.update');
        Route::delete('users/{user}', 'destroy')->name('users.destroy');
    });


});
