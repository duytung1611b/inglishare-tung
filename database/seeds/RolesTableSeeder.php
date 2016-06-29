<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
        	    array('email' => 'duytung1611@gmail.com', 'password'=>Hash::make(12345), 'profileImage'=>'anh1.jpg','gender'=>),
        	]);
    }
}
