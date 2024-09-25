<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomeController::class, "index"])->name("home");

// * students
Route::get("/student", [StudentController::class, "index"]);
Route::post("/student/store", [StudentController::class, "store"])->name("student.store");

// * products
// ! show   view 
Route::get("/products", [ProductController::class, "index"])->name("products");
Route::get("/product/show/{product}", [ProductController::class, "show"])->name("products.show");
Route::get("/product/edit/{product}", [ProductController::class, "edit"])->name("products.edit");
// ! post =  save data
Route::post("/products/store", [ProductController::class, "store"])->name("products.store");
//!  put = edit data 
Route::put("/product/update/{product}", [ProductController::class, "update"])->name("product.update");
// !delete  = delete data
Route::delete("/product/destroy/{product}", [ProductController::class, "destroy"])->name("product.destroy");
