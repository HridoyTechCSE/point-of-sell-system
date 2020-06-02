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
    return redirect()->Route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//employee route
Route::get('/add-employee', 'EmployeeController@index')->name('add.employee');

Route::post('/insert-employee','EmployeeController@store');
Route::get('/all-employee', 'EmployeeController@AllEmployess')->name('all.employee');




Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee');
Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee');
Route::get('/edit-employee/{id}', 'EmployeeController@editEmployee');
Route::post('/update-employee/{id}','EmployeeController@updateemployee');

//customers route

Route::get('/add-customer', 'CustomerController@index')->name('add.customer');
Route::post('/insert-customer','CustomerController@Store');
Route::get('/all-customer', 'CustomerController@AllECustomer')->name('all.customer');
Route::get('/view-customer/{id}', 'CustomerController@ViewCustomer');
Route::get('/edit-customer/{id}', 'CustomerController@editcustomer');
Route::post('/update-customer/{id}', 'CustomerController@updatecustomer');
Route::get('/delete-customer/{id}', 'CustomerController@DeleteCustomer');

//supplier route

Route::get('/add-supplier', 'SupplierController@index')->name('add.supplier');

Route::post('/insert-supplier','SupplierController@SupplierStore');
Route::get('/all-supplier', 'SupplierController@AllSupplier')->name('all.supplier');
Route::get('/view-supplier/{id}', 'SupplierController@ViewSupplier');
Route::get('/delete-supplier/{id}', 'SupplierController@DeleteSupplier');
Route::get('/edit-supplier/{id}', 'SupplierController@editSupplier');
Route::post('/update-supplier/{id}','SupplierController@updateesupplier');
//salary route

Route::get('/add-advance-salary', 'SalaryController@AddAdvanceSalary')->name('add.advancesalary');

Route::post('/insert-advancesalary','SalaryController@insertadvanced');
Route::get('/all-advance-salary', 'SalaryController@AllSalary')->name('all.advancesalary');
Route::get('/pay-salary', 'SalaryController@PaySalary')->name('pay.salary');


//category route
Route::get('/add-category', 'SalaryController@Addcategoryy')->name('add.category');

Route::post('/insert-category','SalaryController@insertCategory');
Route::get('/all-category', 'SalaryController@Allcategory')->name('all.category');
Route::get('/delete-category/{id}', 'SalaryController@Deletecategory');
Route::get('/edit-category/{id}', 'SalaryController@editcategory');
Route::post('/update-category/{id}','SalaryController@updatecategory');


//product route

Route::get('/add-product', 'ProductController@Addproduct')->name('add.product');

Route::post('/insert-product','ProductController@insertproduct');
Route::get('/all-product', 'ProductController@Allproduct')->name('all.product');
Route::get('/delete-product/{id}', 'ProductController@Deleteproduct');
Route::get('/view-product/{id}', 'ProductController@Viewproduct');
Route::get('/edit-product/{id}', 'ProductController@editproduct');
Route::post('/update-product/{id}','ProductController@updateproduct');

//excel import and export
Route::get('/import-product', 'ProductController@Importproduct')->name('import.product');
Route::get('/export', 'ProductController@export')->name('export');
Route::post('/import', 'ProductController@import')->name('import');


//expense route

Route::get('/add-expense', 'ExpenseController@Addexpense')->name('add.expense');

Route::post('/insert-expense','ExpenseController@insertexpense');

Route::get('/today-expense', 'ExpenseController@todayexpense')->name('today.expense');
Route::get('/edit-today-expense/{id}', 'ExpenseController@edittodayexpense');
Route::post('/update-expense/{id}','ExpenseController@updateexpense');
Route::get('/monthly-expense', 'ExpenseController@monthlyexpense')->name('monthly.expense');
Route::get('/yearly-expense', 'ExpenseController@yearlyexpense')->name('yearly.expense');

// attendence route

Route::get('/take-attendence', 'AttendenceController@takeattendence')->name('take.attendence');
Route::post('/insert-attendence','AttendenceController@insertattendence');
Route::get('/all-attendence', 'AttendenceController@allattendence')->name('all.attendence');
Route::post('/update-attendence','AttendenceController@updateattendence');
Route::get('/view-attendence/{edit_date}','AttendenceController@viewattendence');
Route::get('/edit-attendence/{edit_date}', 'AttendenceController@editattendence');
// setting route
Route::get('/website-setting', 'AttendenceController@setting')->name('setting');
Route::post('/update-website/{id}','AttendenceController@UpdateWebsite');

// Pos route here

Route::get('/pos', 'PosController@index')->name('pos');
Route::get('/pending/order', 'PosController@pendingorders')->name('pending.orders');
Route::get('/view-order-status/{id}', 'PosController@vieworder');
Route::get('/pos-done/{id}', 'PosController@posdone');
Route::get('/success/order', 'PosController@successorder')->name('success.orders');



//cart route
Route::post('/add-cart','CartController@index');
Route::post('/cart-update/{rowId}','CartController@CartUpdate');
Route::get('/cart-remove/{rowId}','CartController@CartRemove');
Route::post('/invoice','CartController@createinvoice');
Route::post('/final-invoice','CartController@finalinvoice');













