<?php

use Illuminate\Database\Seeder;

class TransaksiBerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_beras')->insert([
        	'jumlah'	=> 8,
	        'harga'  	=> 6000, //id kabupaten bone dari tabel Kotas
	        'kecamatan' => 'Kec. Barebbo',
	        'kelurahan' 	=> 'Desa Kampuno',
	        'alamat' => 'Kampuno, Desa Kampuno Kec. Barebbo Kab. Bone',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'proses secepatnya dong',
	        'jenis_bayar' => 'cod',
	        'status' => '0',
	        'beras_id' => 1
		]);

		DB::table('transaksi_beras')->insert([
        	'jumlah'	=> 8,
	        'harga'  	=> 6000, //id kabupaten bone dari tabel Kotas
	        'kecamatan' => 'Kec. Bulutempe',
	        'kelurahan' 	=> 'Desa Sugiale',
	        'alamat' => 'Sugiale, Desa Sugiale Kec. Bulutempe Kab. Pare-pare',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'proses cepat please ya kaka',
	        'jenis_bayar' => 'cod',
	        'status' => '0',
	        'beras_id' => 1
		]);
    }
}
