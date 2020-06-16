<?php

Route::get('/','Frontend\HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact.index');
Route::get('/profile', 'HomeController@profile')->name('profile');

Route::get('/contact/delete/{id}', 'HomeController@contactDelete')->name('contact.delete');

Route::post('forms/contact', 'Frontend\HomeController@contact')->name('contact');
// Route::group(['prefix' => 'clients', ''])
Route::resource('/client','Backend\ClientsController');
Route::get('/client/noc/{id}','Backend\ClientsController@noc_form')->name('client.noc');
Route::get('/loan/create/{id}','Backend\ClientsController@loanCreate')->name('loan.create');
Route::post('/loan/submit','Backend\ClientsController@loanSubmit')->name('loan.submit');
Route::get('/loan/edit/{id}','Backend\ClientsController@loanEdit')->name('loan.edit');
Route::patch('/loan/update/{id}','Backend\ClientsController@loanUpdate')->name('loan.update');
Route::get('/loan/show/{id}','Backend\ClientsController@loanShow')->name('loan.show');
Route::get('/client_loan_fetch/{id}','Backend\ClientsController@client_loan_fetch')->name('loan.fetch');

Route::get('/verify', 'VerifyController@getVerify')->name('getverify');
Route::get('/resendVerifyCode', 'VerifyController@resendVerifyCode')->name('resendVerifyCode');
Route::post('/verify', 'VerifyController@postVerfiy')->name('verify');
// Route::get('/verify/{token}', 'VerifyController@verifyUser')->name('verifyUser');
Route::resource('/finance','Backend\FinanceController');
Route::get('/finance/fetch/{vehicle_type}','Backend\FinanceController@fetch')->name('finance.fetch');
Route::get('/finance/loan_fetch/{id}','Backend\FinanceController@loan_fetch')->name('finance.loan_fetch');

Route::resource('payment','PaymentController');
Route::post('payment/status', 'PaymentController@paymentCallback');