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
  return "All Cats";
});

// Cats Individual page
// contains id
Route::get('/cats/{id}', function($id) {
  return "Cat $id";
});
