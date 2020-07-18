<?php

use Illuminate\Database\Seeder;

class SawahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sawahs')->insert([
	        'alamat_id'  => 87, //id kabupaten bone dari tabel Kotas
	        'kecamatan' => 'kec. pinrang',
	        'kelurahan' 	=> 'kel. pinrang',
	        'alamat' => 'Galung, kel. pinrang Kec. Pinrang Kab. Pinrang',
	        'created_by'=> 2, //dari tabel user role petani (dari seeder)
	        'luas_sawah'	=> '20 Ha',
	        'jenis_bibit'	=> 'ciliwung',
	        'jenis_pupuk'	=> 'phonska',
	        'periode_tanam'		=> '3 bulan'
		]);
    }
}
