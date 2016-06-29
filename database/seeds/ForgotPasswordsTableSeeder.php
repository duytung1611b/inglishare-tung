<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class ForgotPasswordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  DB::table('forgotpassword')->insert([
        //     'email' => 'duytung16112@gmail.com',
        //     'token' => 2
        // ]);

        $file = public_path().'\library\Book1.csv';
        $csv = Reader::createFromPath($file);
        $data = $csv->setOffset(1)->fetchAll(); //because we don't want to insert the header

        foreach ($data as $row ){

            DB::table('forgotpassword')->insert(
                    array(
                        'email' => $row[0],
                        'token' => $row[1],
                    )
            );
        };

        
    }
}
