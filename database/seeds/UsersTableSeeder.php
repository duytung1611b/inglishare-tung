\<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
	    $file = public_path().'\library\Book2.csv';
        $csv = Reader::createFromPath($file);
        $data = $csv->setOffset(1)->fetchAll(); //because we don't want to insert the header

        foreach ($data as $row ){
        	var_dump($row);

            DB::table('users')->insert(
                array(
                    'email' => $row[0],
                    'password' => $row[1],
                    'profileImage'=> $row[2],
		            'gender'=> $row[3],
		            'description'=> $row[4],
		            'userType'=> $row[5],
		            'firstName'=> $row[6],
		            'lastName'=> $row[7],
		            'banned'=> $row[8],
		            'birthday'=> $row[9],
					'roleId'=> 2,
				)

            );
        };
	}
    
}
