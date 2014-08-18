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

// Including the Model
  Route::model('cat', 'Cate');

  View::composer('cats.edit', function($view){
    $breeds = Breed::all();
    $bread_options = array_combine( $breeds->lists('id'), $breeds->lists('name') );
    $view->with('breed_options', $bread_options);
  });

  Route::get('/', function(){
    return Redirect::to('cats');
  });

  Route::get('cats', function(){
    $cats = Cat::all();
    return View::make('cats/index')->with('cats', $cats);
  });

  Route::get('cats/breeds/{name}', function() {
    $breed = Breed::whereName($name)->with('cats')->first();
    return View::make('cats/index')
            ->with('breed', $breed)
            ->with('cats', $breed->cats);
  });

  Route::get('cats/{id}', function($id) {
    $cat = Cat::find($id);
    return View::make('cats.single')
          ->with('cat', $cat);
  })->where('id', '[0-9]+');

  Route::group(array("before" => "auth"), function() {
      Route::get('cats/create', function() {
        $cat = new Cat;
        return View::make('cats.edit')
            ->with('cat', $cat)
            ->with('method', 'post');
      });

      Route::get('cats/{cat}/edit', function(Cat $cat) {
          if( Auth::user()->canEdit($cat) ) {
            return View::make('cats.edit')
                ->with('cat', $cat)
                ->with('method', 'put');
          } else {
            return Redirect::to('cats/'. $cat->id)
                  ->with('error', 'You are not allowed to edit this page');
          }
      });

      Route::get('cats/{cat}/delete', function(Cat $cat) {
          if (Auth::user()->canEdit($cat) ) {
            return View::make('cats.edit')
                    ->with('cat', $cat)
                    ->with('method', 'delete');
          } else {
            return Redirect::to('cats/' . $cat->id)
                ->with('error', 'You are not allowed to delete this page');
          }
      });

  });

  Route::get('login', function() {
      return View::make('login');
  });

  Route::post('login', function() {
    if ( Auth::attempt(Input::only('username', 'password')))
      return Redirect::intended('/');
    else
      return Redirect::back()
            ->withInput()
            ->with('error', "Invalid Credentials");
  });

  Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('/')
            ->with('message', 'You are now logged out');
  });
