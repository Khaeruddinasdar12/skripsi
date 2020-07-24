<?php

use Illuminate\Database\Seeder;

class GadaiSawahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gadai_sawahs')->insert([ // Sedang gadai 
        	'periode'	=> '1 tahun',
        	'harga'		=> '20000000',
        	// 'admin_verified' => '1',
        	'admin_by'  => 1, //verified by role admin
        	'sawah_id'  => 1,
        	'status' 	=> 'gadai',
        	'keterangan'=> 'Surat pajak telah diterima oleh pihak Galung App'
		]);

		DB::table('gadai_sawahs')->insert([ // mendaftarkan sawahnya untuk di gadai
        	'periode'	=> '1 tahun',
        	'harga'		=> '50000000',
        	// 'admin_verified' => '0', //belum diverifikasi
        	'admin_by'  => null,
        	'sawah_id'  => 2,
        	'status' 	=> null,
        	'keterangan'=> ''
		]);

        DB::table('gadai_sawahs')->insert([ // riwayat gadai
            'periode'   => '1 tahun',
            'harga'     => '80000000',
            // 'admin_verified' => '0', //belum diverifikasi
            'admin_by'  => 1, //verified by role admin
            'sawah_id'  => 3,
            'status'    => 'selesai',
            'keterangan'=> 'Tergadai tanpa masalah'
        ]);
    }
}
