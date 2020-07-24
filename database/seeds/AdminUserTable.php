<?php

use Illuminate\Database\Seeder;

class AdminUserTable extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([ // Role kosumen
	        'name'  => 'Konsumen User Role',
	        'email' => 'konsumen@gmail.com',
	        'role' 	=> 'konsumen',
	        'tempat_lahir' => 'Galung',
	        'tanggal_lahir'=> '1999-08-04',
	        'alamat'	=> 'Galung, Desa Talungeng Kec. Barebbo Kab. Bone',
	        'alamat_id'	=> 87, // id kabupaten bone dari tabel Kotas
	        'kecamatan'	=> 'Barebbo',
	        'nohp'		=> '082344949505',
	        'rt'		=> '001',
	        'rw'		=> '002',
	        'kelurahan'	=> 'Galung',
	        'password'  => bcrypt('12345678'),
	        'petani_verified' => '0'
		]);

		DB::table('users')->insert([ // Role Petani terverifikasi
	        'name'  => 'Petani User Role',
	        'email' => 'petani@gmail.com',
	        'role' 	=> 'petani',
	        'tempat_lahir' => 'Galung',
	        'tanggal_lahir'=> '1999-08-04',
	        'alamat'	=> 'Galung, Desa Talungeng Kec. Barebbo Kab. Bone',
	        'alamat_id'	=> 87, // id kabupaten bone dari tabel Kotas
	        'kecamatan'	=> 'Barebbo',
	        'nohp'		=> '082344949505',
	        'rt'		=> '001',
	        'rw'		=> '002',
	        'password'  => bcrypt('12345678'),
	        'petani_verified' => '1',
	        'kelurahan'	=> 'Galung',
		]);

		DB::table('users')->insert([ // Role Petani belum terverifikasi
	        'name'  => 'Petani User Unverified',
	        'email' => 'petaniunverified@gmail.com',
	        'role' 	=> 'petani',
	        'tempat_lahir' => 'Galung',
	        'tanggal_lahir'=> '1999-08-04',
	        'alamat'	=> 'Galung, Desa Talungeng Kec. Barebbo Kab. Bone',
	        'alamat_id'	=> 87, // id kabupaten bone dari tabel Kotas
	        'kecamatan'	=> 'Barebbo',
	        'nohp'		=> '082344949505',
	        'rt'		=> '001',
	        'rw'		=> '002',
	        'password'  => bcrypt('12345678'),
	        'petani_verified' => '0',
	        'kelurahan'	=> 'Galung',
		]);

		DB::table('users')->insert([ // Role Petani belum terverifikasi 2
	        'name'  => 'Petani User Unverified2',
	        'email' => 'petaniunverified2@gmail.com',
	        'role' 	=> 'petani',
	        'tempat_lahir' => 'Galung',
	        'tanggal_lahir'=> '1999-08-04',
	        'alamat'	=> 'Galung, Desa Talungeng Kec. Barebbo Kab. Bone',
	        'alamat_id'	=> 87, // id kabupaten bone dari tabel Kotas
	        'kecamatan'	=> 'Barebbo',
	        'nohp'		=> '082344949505',
	        'rt'		=> '001',
	        'rw'		=> '002',
	        'password'  => bcrypt('12345678'),
	        'petani_verified' => '0',
	        'kelurahan'	=> 'Galung',
		]);

		DB::table('admins')->insert([ //Role Admin
	        'name'  => 'Admin Role',
	        'email' => 'admin@gmail.com',
	        'role' 	=> 'admin',
	        'password'  => bcrypt('12345678')
		]);

		DB::table('admins')->insert([ //Role superadmin
	        'name'  => 'Superadmin Role',
	        'email' => 'superadmin@gmail.com',
	        'role' 	=> 'superadmin',
	        'password'  => bcrypt('12345678')
		]);
    }
}
