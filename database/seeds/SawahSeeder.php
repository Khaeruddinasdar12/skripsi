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
	        'kecamatan' => 'Kec. Barebbo',
	        'kelurahan' 	=> 'Desa Kampuno',
	        'alamat' => 'Kampuno, Desa Kampuno Kec. Barebbo Kab. Bone',
	        'created_by'=> 2, //dari tabel user role petani (dari seeder)
	        'luas_sawah'	=> '20 Ha',
	        'jenis_bibit'	=> 'ciliwung',
	        'jenis_pupuk'	=> 'phonska',
	        'periode_tanam'		=> '3 bulan'
		]);

		DB::table('sawahs')->insert([
	        'alamat_id'  => 87, //id kabupaten bone dari tabel Kotas
	        'kecamatan' => 'Kec. Barebbo',
	        'kelurahan' 	=> 'Desa Talungeng',
	        'alamat' => 'Galung, Desa Talungeng Kec. Barebbo Kab. Bone',
	        'created_by'=> 2, //dari tabel user role petani (dari seeder)
	        'luas_sawah'	=> '50 Ha',
	        'jenis_bibit'	=> 'ciliwung',
	        'jenis_pupuk'	=> 'phonska',
	        'periode_tanam'		=> '3 bulan'
		]);

		DB::table('sawahs')->insert([
	        'alamat_id'  => 87, //id kabupaten bone dari tabel Kotas
	        'kecamatan' => 'Kec. Barebbo',
	        'kelurahan' 	=> 'Desa Lampoko',
	        'alamat' => 'Lampoko, Desa Lampoko Kec. Barebbo Kab. Bone',
	        'created_by'=> 2, //dari tabel user role petani (dari seeder)
	        'luas_sawah'	=> '80 Ha',
	        'jenis_bibit'	=> 'ciliwung',
	        'jenis_pupuk'	=> 'phonska',
	        'periode_tanam'		=> '3 bulan'
		]);
    }
}
