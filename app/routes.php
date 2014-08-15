<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Index route
Route::get('/', function(){
  return Redirect::to('cats');
});

// Overview route
Route::get("cats", function(){
  return "All Cats";
});

// Cats Individual page
// contains id
// route with conditions
// where parameter takes two parameters - > name and a regular expression
//  [a-z]+   for only small case letters
//  [a-zA-Z]+  for only small and upper case letters
//  [a-zA-z0-9]+ for alphanumerics
//
Route::get('cats/{id}', function($id) {
  return "Cats # : $id";
})->where('id', '[0-9]+');


// About route

Route::get('about', function(){
  return View::make('about')->with('number_of_cats', 9000);
});
