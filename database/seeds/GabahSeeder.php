<?php

use Illuminate\Database\Seeder;

class GabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gabahs')->insert([
	        'jenis'  => 'Ketan', 
	        'harga' => 6000, //per KG
	        'admin_by' 	=> 1 // rolenya admin di tabel users
		]);

		DB::table('gabahs')->insert([
	        'jenis'  => 'Pera', 
	        'harga' => 5000, //per KG
	        'admin_by' 	=> 1 // rolenya admin di tabel users
		]);

		DB::table('gabahs')->insert([
	        'jenis'  => 'Pulen', 
	        'harga' => 4500, //per KG
	        'admin_by' 	=> 1 // rolenya admin di tabel users
		]);
    }
}
