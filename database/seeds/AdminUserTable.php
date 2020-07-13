<?php

use Illuminate\Database\Seeder;

class AdminUserTable extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
	        'name'  => 'Konsumen User Role',
	        'email' => 'konsumen@gmail.com',
	        'role' 	=> 'konsumen',
	        'tempat_lahir' => 'Galung',
	        'tanggal_lahir'=> '1999-08-04',
	        'alamat'=> 'Galung, Desa Talungeng Kec. Barebbo Kab. Bone',
	        'alamat_id'=> 87, // id kabupaten bone dari tabel Kotas
	        'kecamatan'=> 'Barebbo',
	        'nohp'		=> '082344949505',
	        'password'  => bcrypt('12345678')
		]);

		DB::table('users')->insert([
	        'name'  => 'Petani User Role',
	        'email' => 'petani@gmail.com',
	        'role' 	=> 'petani',
	        'tempat_lahir' => 'Galung',
	        'tanggal_lahir'=> '1999-08-04',
	        'alamat'=> 'Galung, Desa Talungeng Kec. Barebbo Kab. Bone',
	        'alamat_id'=> 87, // id kabupaten bone dari tabel Kotas
	        'kecamatan'=> 'Barebbo',
	        'nohp'		=> '082344949505',
	        'password'  => bcrypt('12345678')
		]);

		DB::table('admins')->insert([
	        'name'  => 'Admin Role',
	        'email' => 'admin@gmail.com',
	        'role' 	=> 'admin',
	        'password'  => bcrypt('12345678')
		]);

		DB::table('admins')->insert([
	        'name'  => 'Superadmin Role',
	        'email' => 'superadmin@gmail.com',
	        'role' 	=> 'superadmin',
	        'password'  => bcrypt('12345678')
		]);
    }
}
