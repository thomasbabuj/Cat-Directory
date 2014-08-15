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

// Overview page route
Route::get('cats', function(){
  // get all records from Cat model
  $cats = Cat::all();

  // assign it to the cat index view
  return View::make('cats.index')->with('cats', $cats);
});

Route::get('cats/breeds/{name}', function($name) {
  //whereName -> dynamic method that translates into a Where name = $name SQL query
  // first()  -> retrieves first instance

  //
  $breed = Breed::whereName($name)->with('cats')->first();
  return View::make('cats.index')
               ->with('breed', $breed)
               ->with('cats', $breed->cats);

});

// Cats Individual page
// contains id
// route with conditions
// where parameter takes two parameters - > name and a regular expression
//  [a-z]+   for only small case letters
//  [a-zA-Z]+  for only small and upper case letters
//  [a-zA-z0-9]+ for alphanumerics
//
/*
Route::get('cats/{id}', function($id) {
  return "Cats # : $id";
})->where('id', '[0-9]+');


Route::get('cats/{id}', function($id){
  $cat = Cat::find($id);
  var_dump ($cat);

  return View::make('cats.single')
                ->with('cat', $cat);
});
*/

Route::model('cat', 'Cat');

Route::get('cats/{cat}', function(Cat $cat) {
  return View::make('cats.single')->with('cat', $cat);
});

// Create a new cat page route

Route::get('cats/create', function() {
  $cat = new Cat;
  return View::make('cats.edit')
               ->with('cat', $cat)
               ->with('method', 'post');
});

Route::get('cats/{cat}/edit', function(Cat $cat){
  return View::make('cats.edit')
               ->with('cat', $cat)
               ->with('method', 'put');
});

Route::get('cats/{cat}/delete', function(Cat $cat) {
  return View::make('cats.edit')
              ->with('cat', $cat)
              ->with('method', 'delete');
});

Route::post('cats', function(){
  $cat = Cat::create(Input::all());
  return Redirect::to('cats/' .$cat->id )->with('message', 'Successfully create page!');
});

Route::post('cats/{cat}', function(Cat $cat){
  $cat->update(Input::all());
  return Redirect::to('cats/'. $cat->id)
      ->with('message', 'Successfully update page!');
});

Route::delete('cats/{cat}', function(Cat $cat) {
  $cat->delete();
  return Redirect::to('cats')
            ->with('message', 'Successfully deleted page');
});

// About route

Route::get('about', function(){
  return View::make('about')->with('number_of_cats', 9000);
});
