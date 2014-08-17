<?php

class UsersTableSeeder extends Seeder {
	public function run()
	{
		 DB::table('users')->truncate();

		 DB::table('users')->insert(array(
		 	array('username' => 'admin', 'password' => Hash::make('hunter2'), 'is_admin' => true ),
		 	array('username' => 'scott', 'password' => Hash::make('tigher'), 'is_admin' => false )
		 ));
	}
}