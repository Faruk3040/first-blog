<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\Forget_passwordController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Models\product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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




Route::namespace('Auth')->group(function () {


    Route::get('/login',[LoginController::class,'login'])->name('login');
    Route::post('/login',[LoginController::class,'check'])->name('login');
    Route::get('/register',[RegisterController::class,'register'])->name('register');
    Route::post('/register',[RegisterController::class,'save'])->name('register');
    Route::get('/forget-password',[Forget_passwordController::class,'forget_password'])->name('forget-password');
    Route::post('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/mails',[MailController::class,'mails'])->name('mails');

});



Route::group(['middleware'=>['isAuth']], function(){
    //dashboard
    Route::get('/',[WelcomeController::class,'welcome'])->name('welcome');

     //changepassword

     Route::get('/change-password',[ChangePasswordController::class,'change_password'])->name('change-password');
     Route::post('/password-update',[ChangePasswordController::class,'password_update'])->name('password-update');

    //category
    Route::get('/categories',[CategoriesController::class,'view_categories'])->name('categories.view_categories');
    Route::get('/add_new_category',[CategoriesController::class,'add_new_category'])->name('categories.add_new_category');
    Route::get('/categories/edit/{id}',[CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put ('/categories/update/{id}',[CategoriesController::class, 'update'])->name('categories.update');
    Route::delete ('/categories/delete/{id}',[CategoriesController::class, 'delete'])->name('categories.delete');
    Route::post('/categories',[CategoriesController::class,'store'])->name('categories.store');
    Route::get('/Export',[CategoriesController::class,'Export']);
    Route::get('/GeneratePDF',[CategoriesController::class,'GeneratePDF'])->name('categories.GeneratePDF');




    //products
    Route::get('/products',[ProductController::class,'view_product'])->name('products.view_product');
    Route::get('/add_new_product',[ProductController::class,'add_new_product'])->name('products.add_new_product');
    Route::get('/products/edit/{id}',[ProductController::class, 'edit'])->name('products.edit');
    Route::put ('/products/update/{id}',[ProductController::class, 'update'])->name('products.update');
    Route::delete ('/products/destroy/{id}',[ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/products',[ProductController::class,'store'])->name('products.store');
    Route::get('/export',[ProductController::class,'export']);
    Route::get('/generatePDF',[ProductController::class,'generatePDF'])->name('products.generatePDF');

    //customer
    Route::get('/customers',[CustomersController::class,'view_customer'])->name('customers.view_customer');
    Route::get('/add_new_customer',[CustomersController::class,'add_new_customer'])->name('customers.add_new_customer');
    Route::get('/customers/edit/{id}',[CustomersController::class, 'edit'])->name('customers.edit');
    Route::put ('/customers/update/{id}',[CustomersController::class, 'update'])->name('customers.update');
    Route::delete ('/customers/destroy/{id}',[CustomersController::class, 'destroy'])->name('customers.destroy');
    Route::post('/customers',[CustomersController::class,'store'])->name('customers.store');
    Route::get('/excel',[CustomersController::class,'excel']);
    Route::get('/customerpdf',[CustomersController::class,'customerpdf'])->name('customers.customerpdf');

});
