<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StatisticController;
use App\Http\Middleware\Adminlogin;
use FontLib\Table\Type\post;

Route::prefix('/')->name('user.')->group(function(){
    Route::get('home',[HomeController::class,'homepage'])->name('home');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'postlogin'])->name('postlogin');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/logout/admin', [UserController::class, 'logoutadmin'])->name('logoutadmin');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'postregis'])->name('register');
    Route::get('aboutus',[UserController::class,'aboutus'])->name('aboutus');
    Route::post('/create', [OrderController::class, 'createorder'])->middleware('customer.login')->name('createorder');
    Route::get('/detail/{id}', [HomeController::class, 'detailofcus'])->middleware('customer.login')->name('detailofcus');
    Route::get('/cart',[HomeController::class,'cart'])->middleware('customer.login')->name('cart');
    Route::post('/cart',[HomeController::class,'postcart'])->middleware('customer.login');
    Route::get('/order-info',[HomeController::class,'order'])->middleware('customer.login')->name('orderinfo');
    Route::get('/delcart_{pro_id}_{cus_id}',[HomeController::class,'delcart'])->middleware('customer.login')->name('delcart');
    Route::get('/confirm/done/{id}', [HomeController::class, 'confirmdone'])->middleware('customer.login')->name('confirmdone');
    Route::get('/confirm/can/{id}', [HomeController::class, 'confirmcan'])->middleware('customer.login')->name('confirmcan');
    Route::post('/comment_{pro_id}_{cus_id}',[HomeController::class,'postreview'])->name('review');
    Route::get('/search',[HomeController::class,'search'])->name('search');
});



//--Route shop
Route::prefix('/shop')->name('shop.')->group(function(){
    Route::get('/',[HomeController::class,'shop'])->name('cat');
    Route::get('floppydisk',[HomeController::class,'floppydisk'])->name('floppydisk');
    //get propertise san pham
    Route::get('/product/{id}',[HomeController::class,'getProduct'])->name('getpro');
});


//Route homeadmin
Route::prefix('admin')->middleware('admin.login')->name('admin.')->group(function(){
    Route::get('/home', [AdminController::class, 'home'])->name('home');
    Route::get('/list', [AdminController::class, 'listadmin'])->name('list');
    Route::get('/add', [AdminController::class, 'add'])->name('add');
    Route::post('/add', [AdminController::class, 'postadd'])->name('postadd');
    Route::get('/edit/{id}', [AdminController::class, 'editadmin'])->name('edit');
    Route::post('/edit/{id}', [AdminController::class, 'posteditadmin'])->name('postedit');
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
});

// Route category
Route::prefix('admin/category')->middleware('admin.login')->name('category.')->group(function(){
    Route::get('/list', [CategoryController::class, 'list'])->name('list');
    Route::get('/add', [CategoryController::class, 'add'])->name('add');
    Route::post('/add', [CategoryController::class, 'postadd']);
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [CategoryController::class, 'postedit']);
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
});

// Route product
Route::prefix('admin/product')->middleware('admin.login')->name('product.')->group(function(){
    Route::get('/list', [ProductController::class, 'list'])->name('list');
    Route::get('/add', [ProductController::class, 'add'])->name('add');
    Route::post('/add', [ProductController::class, 'postadd']);
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [ProductController::class, 'postedit']);
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
    Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
});

// Route order
Route::prefix('admin/order')->middleware('admin.login')->name('order.')->group(function(){
    Route::get('/list', [OrderController::class, 'list'])->name('list');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('detail');
    Route::get('/detail/export/{id}', [OrderController::class, 'exportPDF'])->name('exportPDF');
    Route::get('/complete', [OrderController::class, 'editcpl'])->name('complete');
    Route::get('/cancel', [OrderController::class, 'editcacel'])->name('cancel');
});

// Route list cutomers
Route::prefix('admin/customer')->middleware('admin.login')->name('customer.')->group(function(){
    Route::get('/list', [UserController::class, 'listcustomers'])->name('list');
});

// Route thống kê
Route::prefix('admin/statistic')->middleware('admin.login')->name('statistic.')->group(function(){
    Route::get('/list/product/selling', [StatisticController::class, 'listproselling'])->name('proselling');
    Route::get('/list/product/revenue', [StatisticController::class, 'listprorevenue'])->name('prorevenue');
    Route::get('/list/customers/revenue', [StatisticController::class, 'listcusprevenue'])->name('cusrevenue');
    Route::get('/list/orderday', [StatisticController::class, 'listday'])->name('saleday');
    Route::get('/list/ordermonth', [StatisticController::class, 'listmonth'])->name('salemonth');
});



