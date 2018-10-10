<?php

Route::get('/send', 'MailController@send');
Route::get('/', 'PagesController@index');
Route::get('/testish', 'PagesController@test');
Route::get('/getyoga', 'PagesController@yoga');
Route::get('/gardsbutik', 'PagesController@webshop');
Route::get('/kontakt', 'PagesController@contact');
Route::post('/kontakt', 'PagesController@postContact');
Route::resource('blogg', 'PostsController');
Route::resource('recept', 'RecipesController');
Auth::routes();
Route::get('/dashboard', 'DashboardController@index');