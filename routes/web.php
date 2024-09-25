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

Route::get("/products", [ProductController::class, "index"])->name("products");
Route::post("/products/store", [ProductController::class, "store"])->name("products.store");
Route::get("/product/show/{product}", [ProductController::class, "show"])->name("products.show");
Route::delete("/product/destroy/{product}", [ProductController::class, "destroy"])->name("product.destroy");
