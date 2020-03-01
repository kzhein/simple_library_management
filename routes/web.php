<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');



Route::get('/dashboard/borrower', 'BorrowerController@index')->name('borrower.index');
Route::get('/dashboard/borrower/create', 'BorrowerController@create')->name('borrower.create');
Route::post('/dashboard/borrower', 'BorrowerController@store')->name('borrower.store');
Route::get('/dashboard/borrower/{borrower}/edit', 'BorrowerController@edit')->name('borrower.edit');
Route::patch('/dashboard/borrower/{borrower}', 'BorrowerController@update')->name('borrower.update');
Route::delete('/dashboard/borrower/{borrower}', 'BorrowerController@destroy')->name('borrower.destroy');



Route::get('/dashboard/book', 'BookController@index')->name('book.index');
Route::get('/dashboard/book/create', 'BookController@create')->name('book.create');
Route::post('/dashboard/book', 'BookController@store')->name('book.store');
Route::get('/dashboard/book/{book}/edit', 'BookController@edit')->name('book.edit');
Route::patch('/dashboard/book/{book}', 'BookController@update')->name('book.update');
Route::delete('/dashboard/book/{book}', 'BookController@destroy')->name('book.destroy');


Route::get('/dashboard/category', 'CategoryController@index')->name('category.index');
Route::get('/dashboard/category/create', 'CategoryController@create')->name('category.create');
Route::post('/dashboard/category', 'CategoryController@store')->name('category.store');
Route::get('/dashboard/category/{category}/edit', 'CategoryController@edit')->name('category.edit');
Route::patch('/dashboard/category/{category}', 'CategoryController@update')->name('category.update');
Route::delete('/dashboard/category/{category}', 'CategoryController@destroy')->name('category.destroy');


Route::get('/dashboard/rent', 'RentController@index')->name('rent.index');
Route::post('/dashboard/rent', 'RentController@store')->name('rent.store');



Route::get('/dashboard/return', 'ReturnController@index')->name('return.index');
Route::patch('/dashboard/return/{return}', 'ReturnController@update')->name('return.update');

Route::get('/dashboard/record', 'RecordController@index')->name('record.index');




