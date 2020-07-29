<?php

use Illuminate\Database\Seeder;

class BerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beras')->insert([
	        'nama'  	=> 'Ketan', 
	        'harga' 	=> 6000, //per KG
	        'min_beli' 	=> 5,
	        'stok' 		=> 25,
	        'deskripsi' => 'Beras berkualitas serius ini cika',
	        'gambar' 	=> null,
	        'admin_by' 	=> 1 //admin
		]);

		DB::table('beras')->insert([
	        'nama'  	=> 'Pulut', 
	        'harga' 	=> 5000, //per KG
	        'min_beli' 	=> 5, 
	        'stok' 		=> 75,  
	        'deskripsi' => 'Beras berkualitas serius ini cika',
	        'gambar' 	=> null,
	        'admin_by' 	=> 1 //admin
		]);
    }
}
