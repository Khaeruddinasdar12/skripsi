<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\TransaksiGabah;
use App\TransaksiSawah;
use App\TransaksiBarang;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        $gbh = TransaksiGabah::where('status', '0')
            ->count(); // jumlah transaksi gabah

        $mt = TransaksiSawah::where('jenis', 'mt')
            ->where('status', null)
            ->count(); //jumlah transaksi modal tanam
        $gs = TransaksiSawah::where('jenis', 'gs')
            ->where('status', null)

            ->count(); // jumlah transaksi gadai sawah
        $brg = TransaksiBarang::where('status', '0')
            ->count(); // jumlah transaksi barang
        View::share('gbh', $gbh);
        View::share('mt', $mt);
        View::share('gs', $gs);
        View::share('brg', $brg);
    }
}
