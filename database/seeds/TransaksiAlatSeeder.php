<?php

use Illuminate\Database\Seeder;

class TransaksiAlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_alats')->insert([
        	'jumlah'	=> 1,
	        'harga'  	=> 800000,
	        'kecamatan' => 'Kec. Barebbo',
	        'kelurahan' 	=> 'Desa Kampuno',
	        'alamat' => 'Kampuno, Desa Kampuno Kec. Barebbo Kab. Bone',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'semoga barangnya bagus',
	        'jenis_bayar' => 'cod',
	        'status' => '0',
	        'alat_id' => 1
		]);

		DB::table('transaksi_alats')->insert([
        	'jumlah'	=> 1,
	        'harga'  	=> 12000000,
	        'kecamatan' => 'Kec. Bulutempe',
	        'kelurahan' 	=> 'Desa Sugiale',
	        'alamat' => 'Sugiale, Desa Sugiale Kec. Bulutempe Kab. Pare-pare',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'selesaikan pesanan alat saya kak secepatnya',
	        'jenis_bayar' => 'cod',
	        'status' => '0',
	        'alat_id' => 1
		]);


		//riwayat transaksi Alat
		DB::table('transaksi_alats')->insert([
        	'jumlah'	=> 1,
	        'harga'  	=> 12000000,
	        'kecamatan' => 'Kec. Bulutempe',
	        'kelurahan' 	=> 'Desa Sugiale',
	        'alamat' => 'Sugiale, Desa Sugiale Kec. Bulutempe Kab. Pare-pare',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'ini adalah contoh riwayat transaksi alat',
	        'jenis_bayar' => 'cod',
	        'status' => '1',
	        'alat_id' => 1,
	        'admin_id' => 1
		]);
    }
}
