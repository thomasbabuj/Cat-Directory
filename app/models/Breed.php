<?php

/*
*  Breed Model
*  this model defined with the inverse hasMany relationship
*
 */

class Breed extends Eloquent {

  public $timestamps = false;

  public function cats() {
    return $this->hasMany('Cat');
  }

}


