<?php

use App\Http\Controllers\Admin_all_Controller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheifController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\Is_Admin;
use Illuminate\Support\Facades\Route;

//user route
Route::group(['middleware' => "check"], function () {

    Route::get('/', [FoodController::class, 'food'])->name("all_food1");

});

//auth route
Route::group(["middleware" => 'auth'], function () {

    Route::get('/check', [Is_Admin::class, "is_admin"]);
    Route::group(['middleware' => "check"], function () {

        Route::post('/add_to_cart', [CartController::class, "add_cart"])->name("add_cart");
        Route::get('/cart', [CartController::class, "ck"])->name("add_cart_c");
        Route::get('/loap', [CartController::class, "loap"])->name("loap");
        Route::get('/p/{fid}', [CartController::class, "edit"])->name("edit_cart");
        Route::get('/order', [CartController::class, "order"])->name("order");

    });

//admin route
    Route::group(['middleware' => 'test'], function () {

        Route::get("/user", [Admin_all_Controller::class, 'user'])->name("user");
        Route::get("/all/order", [Admin_all_Controller::class, 'all_order'])->name("op");
        Route::get("/delete/order/{id}", [Admin_all_Controller::class, 'delete_order'])->name("delete_order");
        Route::get("/chef", [CheifController::class, 'x'])->name("chef");
        Route::post("/chef", [CheifController::class, 'y'])->name("chef_Post");
        Route::get("/chef/load", [CheifController::class, 'z'])->name("load_chef");
        Route::get("/chef/edit/{id}", [CheifController::class, 'a'])->name("edit_chef");
        Route::get("/chef/dlt/{id}", [CheifController::class, 'c'])->name("dlt_chef");
        Route::post("/chef/update", [CheifController::class, 'b'])->name("update_chef");
        Route::get("/load", [Admin_all_Controller::class, 'load'])->name("loader");
        Route::get('/dlt/{id}', [Admin_all_Controller::class, 'dlt'])->name('dlt');
        Route::get('/edit/{id}', [FoodController::class, 'edit'])->name('edt');
        Route::get('/dlt/{id}', [FoodController::class, 'dlt'])->name('dlt1');
        Route::get('/food', [Admin_all_Controller::class, 'admin_food'])->name('food');
        Route::get('/food/all', [FoodController::class, 'all_food'])->name('all_food');
        Route::post('/food', [FoodController::class, 'admin_food_insert'])->name('insert_food');
        Route::post('/food/update', [FoodController::class, 'admin_food_update'])->name('update_food');
        // Route::post('/add_to_cart',[CartController::class,"add_cart"])->name("add_cart");

    });

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
