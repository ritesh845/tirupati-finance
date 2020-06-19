<?php

Route::get('/','Frontend\HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');

// Contact 
Route::get('/contact', 'HomeController@contact')->name('contact.index');
Route::get('/contact/delete/{id}', 'HomeController@contactDelete')->name('contact.delete');
Route::post('forms/contact', 'Frontend\HomeController@contact')->name('contact');


// Route::group(['prefix' => 'clients', ''])
Route::resource('/client','Backend\ClientsController');
Route::get('/client/delete/{id}','Backend\ClientsController@delete')->name('client.delete');

Route::get('/loan/create/{id}','Backend\ClientsController@loanCreate')->name('loan.create');
Route::post('/loan/submit','Backend\ClientsController@loanSubmit')->name('loan.submit');
Route::get('/loan/edit/{id}','Backend\ClientsController@loanEdit')->name('loan.edit');
Route::patch('/loan/update/{id}','Backend\ClientsController@loanUpdate')->name('loan.update');
Route::get('/loan/show/{id}','Backend\ClientsController@loanShow')->name('loan.show');
Route::get('/loan/delete/{id}','Backend\ClientsController@loanDelete')->name('loan.delete');
Route::get('/client_loan_fetch/{id}','Backend\ClientsController@client_loan_fetch')->name('loan.fetch');

Route::get('/loan/noc/{id}','Backend\LoanController@noc_form')->name('loan.noc');



//VerifyController
Route::get('/verify', 'VerifyController@getVerify')->name('getverify');
Route::get('/resendVerifyCode', 'VerifyController@resendVerifyCode')->name('resendVerifyCode');
Route::post('/verify', 'VerifyController@postVerfiy')->name('verify');

// Route::get('/verify/{token}', 'VerifyController@verifyUser')->name('verifyUser');

//Finance Amount
Route::resource('/finance','Backend\FinanceController');
Route::get('/finance/fetch/{vehicle_type}','Backend\FinanceController@fetch')->name('finance.fetch');
Route::post('/finance/loan_fetch/','Backend\FinanceController@loan_fetch')->name('finance.loan_fetch');

//Payment
Route::resource('payment','PaymentController');
Route::post('payment/status', 'PaymentController@paymentCallback');
Route::get('instalment/reciept/{id}', 'PaymentController@instalment_reciept')->name('instalment.reciept');
Route::post('instalment/fetch', 'PaymentController@instalment_fetch')->name('instalment.fetch');
Route::post('instalment/pay', 'PaymentController@instalment_pay')->name('instalment.pay');


// Message
Route::get('/message','HomeController@message')->name('message');
Route::get('/message/create','HomeController@messageCreate')->name('message.create');
Route::post('/message/store','HomeController@messageStore')->name('message.store');

//Employee Manage
Route::resource('employee','Backend\EmployeeController');
//Loans 
Route::get('/loan/index','Backend\LoanController@index')->name('loan.index');


Route::get('instalment/reminder','HomeController@beforeDateInstalmentReminder');

Route::get('/password_change', 'HomeController@password_change')->name('password_change');
Route::post('/user/change-password', 'HomeController@changePassword')->name('change-password');