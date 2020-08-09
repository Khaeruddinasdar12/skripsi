<?php

use Illuminate\Database\Seeder;

class TransaksiBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// TRANSAKSI BERAS
		DB::table('transaksi_barangs')->insert([
        	'jumlah'	=> 8,
	        'harga'  	=> 6000,
	        'kecamatan' => 'Kec. Barebbo',
	        'kelurahan' 	=> 'Desa Kampuno',
	        'alamat' => 'Kampuno, Desa Kampuno Kec. Barebbo Kab. Bone',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'proses secepatnya dong',
	        'jenis_bayar' => 'cod',
	        'status' => '0',
	        'barang_id' => 1
		]);

		DB::table('transaksi_barangs')->insert([
        	'jumlah'	=> 8,
	        'harga'  	=> 6000,
	        'kecamatan' => 'Kec. Bulutempe',
	        'kelurahan' 	=> 'Desa Sugiale',
	        'alamat' => 'Sugiale, Desa Sugiale Kec. Bulutempe Kab. Pare-pare',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'proses cepat please ya kaka',
	        'jenis_bayar' => 'cod',
	        'status' => '0',
	        'barang_id' => 1
		]);

		//riwayat transaksi Beras
		DB::table('transaksi_barangs')->insert([
        	'jumlah'	=> 5,
	        'harga'  	=> 5500,
	        'kecamatan' => 'Kec. Bulutempe',
	        'kelurahan' 	=> 'Desa Sugiale',
	        'alamat' => 'Sugiale, Desa Sugiale Kec. Bulutempe Kab. Pare-pare',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'ini adalah contoh riwayat transaksi beras',
	        'jenis_bayar' => 'cod',
	        'status' => '1',
	        'barang_id' => 1,
	        'admin_id' => 1
		]);
		// END TRANSAKSI BERAS


    	// TRANSAKSI ALAT
	        DB::table('transaksi_barangs')->insert([
	        	'jumlah'	=> 1,
		        'harga'  	=> 800000,
		        'kecamatan' => 'Kec. Barebbo',
		        'kelurahan' 	=> 'Desa Kampuno',
		        'alamat' => 'Kampuno, Desa Kampuno Kec. Barebbo Kab. Bone',
		        'user_id'=> 2, //dari tabel user role petani (dari seeder)
		        'keterangan' => 'semoga barangnya bagus',
		        'jenis_bayar' => 'cod',
		        'status' => '0',
		        'barang_id' => 3
			]);

			DB::table('transaksi_barangs')->insert([
	        	'jumlah'	=> 1,
		        'harga'  	=> 12000000,
		        'kecamatan' => 'Kec. Bulutempe',
		        'kelurahan' 	=> 'Desa Sugiale',
		        'alamat' => 'Sugiale, Desa Sugiale Kec. Bulutempe Kab. Pare-pare',
		        'user_id'=> 2, //dari tabel user role petani (dari seeder)
		        'keterangan' => 'selesaikan pesanan alat saya kak secepatnya',
		        'jenis_bayar' => 'cod',
		        'status' => '0',
		        'barang_id' => 3
			]);


			//riwayat transaksi Alat
			DB::table('transaksi_barangs')->insert([
	        	'jumlah'	=> 1,
		        'harga'  	=> 12000000,
		        'kecamatan' => 'Kec. Bulutempe',
		        'kelurahan' 	=> 'Desa Sugiale',
		        'alamat' => 'Sugiale, Desa Sugiale Kec. Bulutempe Kab. Pare-pare',
		        'user_id'=> 2, //dari tabel user role petani (dari seeder)
		        'keterangan' => 'ini adalah contoh riwayat transaksi alat',
		        'jenis_bayar' => 'cod',
		        'status' => '1',
		        'barang_id' => 3,
		        'admin_id' => 1
			]);
		// END TRANSAKSI ALAT


		// TRANSAKSI BIBIT
		DB::table('transaksi_barangs')->insert([
        	'jumlah'	=> 8,
	        'harga'  	=> 6500,
	        'kecamatan' => 'Kec. Barebbo',
	        'kelurahan' 	=> 'Desa Kampuno',
	        'alamat' => 'Kampuno, Desa Kampuno Kec. Barebbo Kab. Bone',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'proses secepatnya dong',
	        'jenis_bayar' => 'cod',
	        'status' => '0',
	        'barang_id' => 5
		]);

		DB::table('transaksi_barangs')->insert([
        	'jumlah'	=> 8,
	        'harga'  	=> 6500, 
	        'kecamatan' => 'Kec. Bulutempe',
	        'kelurahan' 	=> 'Desa Sugiale',
	        'alamat' => 'Sugiale, Desa Sugiale Kec. Bulutempe Kab. Pare-pare',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'proses cepat please ya kaka',
	        'jenis_bayar' => 'cod',
	        'status' => '0',
	        'barang_id' => 5
		]);

		//riwayat transaksi bibit
		DB::table('transaksi_barangs')->insert([
        	'jumlah'	=> 5,
	        'harga'  	=> 5500,
	        'kecamatan' => 'Kec. Bulutempe',
	        'kelurahan' 	=> 'Desa Sugiale',
	        'alamat' => 'Sugiale, Desa Sugiale Kec. Bulutempe Kab. Pare-pare',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'ini adalah contoh riwayat transaksi BIBIT',
	        'jenis_bayar' => 'cod',
	        'status' => '1',
	        'barang_id' => 5,
	        'admin_id' => 1
		]);
		// END TRANSAKSI BIBIT


		// TRANSAKSI PUPUK
		DB::table('transaksi_barangs')->insert([
        	'jumlah'	=> 8,
	        'harga'  	=> 8000,
	        'kecamatan' => 'Kec. Barebbo',
	        'kelurahan' 	=> 'Desa Kampuno',
	        'alamat' => 'Kampuno, Desa Kampuno Kec. Barebbo Kab. Bone',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'saya harap pupuk ini cocok',
	        'jenis_bayar' => 'cod',
	        'status' => '0',
	        'barang_id' => 7
		]);

		DB::table('transaksi_barangs')->insert([
        	'jumlah'	=> 8,
	        'harga'  	=> 6500, 
	        'kecamatan' => 'Kec. Bulutempe',
	        'kelurahan' 	=> 'Desa Sugiale',
	        'alamat' => 'Sugiale, Desa Sugiale Kec. Bulutempe Kab. Pare-pare',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'semoga benar-benar berkualitas',
	        'jenis_bayar' => 'cod',
	        'status' => '0',
	        'barang_id' => 7
		]);

		//riwayat transaksi pupuk
		DB::table('transaksi_barangs')->insert([
        	'jumlah'	=> 5,
	        'harga'  	=> 5500,
	        'kecamatan' => 'Kec. Bulutempe',
	        'kelurahan' 	=> 'Desa Sugiale',
	        'alamat' => 'Sugiale, Desa Sugiale Kec. Bulutempe Kab. Pare-pare',
	        'user_id'=> 2, //dari tabel user role petani (dari seeder)
	        'keterangan' => 'ini adalah contoh riwayat transaksi pupuk',
	        'jenis_bayar' => 'cod',
	        'status' => '1',
	        'barang_id' => 7,
	        'admin_id' => 1
		]);
		// END TRANSAKSI BIBIT

    }	
}
