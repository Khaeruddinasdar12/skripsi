<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserTable::class);
        $this->call(ProvinsiSeeder::class);
        $this->call(KotaSeeder::class);
        $this->call(SawahSeeder::class);
        $this->call(GadaiSawahSeeder::class);
        $this->call(GabahSeeder::class);
        $this->call(BerasSeeder::class);
        $this->call(TransaksiBerasSeeder::class);
        $this->call(AlatSeeder::class);
    }
}
