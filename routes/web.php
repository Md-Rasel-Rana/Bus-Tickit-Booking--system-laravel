<?php

use App\Http\Controllers\Democontroller;
use Illuminate\Support\Facades\Route;



Route::get('/',[Democontroller::class,'index'])->name('index');
Route::get('/login',[Democontroller::class,'signIn'])->name('user.signIn');
Route::post('/signin/post',[Democontroller::class,'User_signinStore'])->name('user.infoStore');
Route::post('/store',[Democontroller::class,'tripStore'])->name('trips.store');
Route::get('/login/purchase',[Democontroller::class,'trippurchaseview'])->name('trips.purchase');
Route::post('/login/purchase/tickitsell',[Democontroller::class,'trippurchasesell'])->name('trips.purchasesell');
Route::get('/showtickit',[Democontroller::class,'tickitshow'])->name('show.tickit');

