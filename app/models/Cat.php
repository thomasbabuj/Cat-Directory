<?php

/*
*  Cat Model
*  This model will have a belongTo relationship with Breed model
*  By convention, the column that Laravel will use to find the related model
*  has to be called breed_id in the database.
 */

class Cat extends Eloquent {

  protected $fillable = array('name' , 'date_of_birth', 'breed_id');

  public function breed() {
    return $this->belongsTo('Breed');
  }

  public function owners() {
  	return $this->belongsTo('User');
  }

}
