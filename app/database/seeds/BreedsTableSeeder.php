<?php

/*
* BreedsTable Seeder class
*
 */

class BreedsTableSeeder extends Seeder {
  
  public function run() {
  	
  	DB::table('breeds')->truncate();

    DB::table('breeds')->insert(array(
      array('id' => 1, 'name' => 'Domestic'),
      array('id' => 2, 'name' => 'Persian'),
      array('id' => 3, 'name' => 'Slamese'),
      array('id' => 4, 'name' => 'Abyssinian'),
    ));

  }

}
