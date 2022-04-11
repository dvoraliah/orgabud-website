<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\MonthController;
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

Route::controller(AuthController::class)->group(function(){
    Route::Post('register', 'register')->name('auth.register');
    Route::Post('login', 'login')->name('auth.login');
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('logout', 'logout')->name('auth.logout');
    });
});

//Routes qui nécessitent une authentification : 
//Routes uniquement pour user et premium    
Route::group(['middleware' => ['auth:sanctum']], function () {
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
        Route::get('years', 'index')->name('years.index');
        Route::get('years/{year}', 'show')->name('years.show');
    });

    /* Route pour les modifications des valeurs de la table months */
    Route::controller(MonthController::class)->group(function () {
        Route::get('months', 'index')->name('months.index');
        Route::get('months/{month}', 'show')->name('months.show');
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

    // /* Route pour les modifications des valeurs de la table status : les status qui détermine les permissions des utilisateurs */
    Route::controller(StatusController::class)->group(function () {
        Route::get('status/{status}', 'show')->name('status.show');
        Route::put('status/{status}', 'update')->name('status.update');
    });

    /* Route pour les modifications des valeurs de la table users : les utilisateurs */
    Route::controller(UserController::class)->group(function () {    
        Route::get('users/{user}', 'show')->name('users.show');
        Route::put('users/{user}', 'update')->name('users.update');
        Route::delete('users/{user}', 'destroy')->name('users.destroy');
    });

        /* Route pour les modifications des valeurs de la table status : les status qui détermine les permissions des utilisateurs */
    Route::controller(StatusController::class)->group(function () {
        Route::Post('status', 'store')->name('status.store');
        Route::get('status', 'index')->name('status.index');
        Route::get('status/{status}', 'show')->name('status.show');
        Route::put('status/{status}', 'update')->name('status.update');
        Route::delete('status/{status}', 'destroy')->name('status.destroy');
    });

    //Routes à faire pour les admins :
    Route::controller(AdminController::class)->group(function () {
        Route::get('admin/budgets', 'indexBudget')->name('admin.budget.index');
        Route::get('admin/status', 'indexStatus')->name('admin.status.index');
        Route::get('admin/users', 'indexUsers')->name('admin.users.index');
        


        // Route::get('admin/{page}', 'index')->name('admin.index');
        Route::Post('admin/{page}', 'store')->name('admin.store');
        Route::get('admin/{page}/{id}', 'show')->name('admin.show');
        Route::put('admin/{page}/{id}', 'update')->name('admin.update');
        Route::delete('admin/{page}/{id}', 'delete')->name('admin/destroy');
    });
    /* 
        Route::controller(AdminController::class)->group(function () {
            Route::Post('admin/budgets', 'store'); 
            Route::put('admin/budgets/{budget}', 'update');
            Route::delete('admin/budgets/{budget}', 'destroy');

            Route::Post('admin/fields', 'store'); 
            Route::put('admin/fields/{field}', 'update');
            Route::delete('admin/fields/{field}', 'destroy');

            Route::Post('admin/status', 'store'); 
            Route::put('admin/status/{status}', 'update');
            Route::delete('admin/status/{status}', 'destroy');

            Route::post('admin/categories', 'store');
            Route::put('admin/categories/{category}', 'update');
            Route::delete('admin/categories/{category}', 'destroy');

            Route::Post('admin/users', 'store'); 
            Route::put('admin/users/{user}', 'update');
            Route::delete('admin/users/{user}', 'destroy');
        }
     */
});
