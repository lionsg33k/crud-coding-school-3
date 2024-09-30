<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TodoController;
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


//* To do list

Route::get("/todo", [TodoController::class, "index"])->name("todo");
Route::post("/todo/store", [TodoController::class, "store"])->name("todo.store");
Route::put("/todo/update/{todo}", [TodoController::class, "update"])->name("todo.update");
Route::delete("/todo/destroy/{todo}", [TodoController::class, "destroy"])->name("todo.destroy");

//* contact us email form

Route::get("/contact-us" , [ContactController::class , "index"])->name("contact-us");
Route::get("/contact/mail" , [ContactController::class , "mailDashboard"])->name("contact.mail");
Route::post("/contact/mail/filter" , [ContactController::class , "filter"])->name("contact.filter");
Route::post("/contact-us/store", [ContactController::class, "store"])->name("contact-us.store");
Route::put("/contact/mail/update/{contact}", [ContactController::class, "update"])->name("contact-us.update");
Route::delete("/contact/mail/destroy/{contact}", [ContactController::class, "destroy"])->name("contact-us.destroy");