<?php

use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alats')->insert([
	        'nama'  	=> 'Pompa Air', 
	        'harga' 	=> 1450000,
	        'stok' 		=> 3,
	        'keterangan'=> 'warna ungu',
	        'admin_id' 	=> 1 //admin
		]);

		DB::table('alats')->insert([
	        'nama'  	=> 'Selang pompa Air', 
	        'harga' 	=> 1450000,
	        'stok' 		=> 3,
	        'keterangan'=> '15 meter',
	        'admin_id' 	=> 1 //admin
		]);
    }
}
