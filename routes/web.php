<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomeController::class, "index"])->name("home");

// * students
Route::get("/student", [StudentController::class, "index"]);
Route::post("/student/store", [StudentController::class, "store"])->name("student.store");

// * products

Route::get("/products", [ProductController::class, "index"])->name("products");
Route::get("/product/show/", [ProductController::class, "show"])->name("products.show");
Route::get("/product/edit/{product}", [ProductController::class, "edit"])->name("products.edit");
Route::post("/products/store", [ProductController::class, "store"])->name("products.store");
Route::post("/products/filter", [ProductController::class, "filtredProduct"])->name("products.filter");
Route::put("/product/update/{product}", [ProductController::class, "update"])->name("product.update");
Route::delete("/product/destroy/{product}", [ProductController::class, "destroy"])->name("product.destroy");

//^ Cart -Product

Route::get("/cart", [CartController::class, "index"])->name("cart");
Route::post("/cart/store", [CartController::class, "store"])->name("cart.store");
Route::put("/cart/update/{cart}", [CartController::class, "update"])->name("cart.update");
Route::delete("/cart/destroy/{cart}", [CartController::class, "destroy"])->name("cart.destroy");


//* To do list

Route::get("/todo", [TodoController::class, "index"])->name("todo");
Route::post("/todo/store", [TodoController::class, "store"])->name("todo.store");
Route::put("/todo/update/{todo}", [TodoController::class, "update"])->name("todo.update");
Route::delete("/todo/destroy/{todo}", [TodoController::class, "destroy"])->name("todo.destroy");

//* contact us email form

Route::get("/contact-us", [ContactController::class, "index"])->name("contact-us");
Route::get("/contact/mail", [ContactController::class, "mailDashboard"])->name("contact.mail");
Route::post("/contact/mail/", [ContactController::class, "filter"])->name("contact.filter");
Route::post("/contact-us/store", [ContactController::class, "store"])->name("contact-us.store");
Route::put("/contact/mail/update/{contact}", [ContactController::class, "update"])->name("contact-us.update");
Route::delete("/contact/mail/destroy/{contact}", [ContactController::class, "destroy"])->name("contact-us.destroy");


//* image crud

Route::get("/profile", [ProfileController::class, "index"])->name("profile");
Route::post("/profile/store", [ProfileController::class, "store"]);
Route::post("/profile/url/store", [ProfileController::class, "urlStore"]);
Route::put("/profile/update/{profile}", [ProfileController::class, "update"])->name("profile.update");
Route::delete('/profile/destroy/{profile}', [ProfileController::class, 'destroy'])->name('profile.destroy');
