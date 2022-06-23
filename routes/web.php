<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/category', 'CategoryController')->middleware('auth');

Route::resource('/medicine', 'MedicineController')->middleware('auth');

Route::resource('/buyer', 'BuyerController')->middleware('auth');

Route::resource('/transaction', 'TransactionController')->middleware('auth');

Route::middleware(['auth'])->group(function() {

    Route::get('/report/highestprices', 'MedicineController@highestprices')->name('report.highestprices');

    Route::get('/report/topcustomers', 'TransactionController@topcustomers')->name('report.topcustomers');

});

Route::middleware(['auth'])->group(function() {

    Route::post('/medicine/showInfo', 'MedicineController@showInfo')->name('medicine.showInfo');
    
    Route::post('/medicine/getEditFormA', 'MedicineController@getEditFormA')->name('medicine.getEditFormA');
    
    Route::post('/medicine/getEditFormB', 'MedicineController@getEditFormB')->name('medicine.getEditFormB');
    
    Route::post('/medicine/saveData', 'MedicineController@saveData')->name('medicine.saveData');
    
    Route::post('/medicine/deleteData', 'MedicineController@deleteData')->name('medicine.deleteData');

});


Route::middleware(['auth'])->group(function() {
    
    Route::post('/transaction/showDataAjax', 'TransactionController@showAjax')->name('transaction.showAjax');

});

Auth::routes();

Route::get('/controlpanel', 'HomeController@controlpanel')->name('controlpanel');

Route::get('/home', 'HomeController@index')->name('home');
