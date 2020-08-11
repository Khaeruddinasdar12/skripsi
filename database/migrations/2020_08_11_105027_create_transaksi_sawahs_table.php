<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiSawahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_sawahs', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['mt', 'gs']);
            $table->string('periode')->nullable();
            $table->integer('harga')->nullable();
            // $table->enum('admin_verified', [0, 1]);
            $table->integer('admin_id')->nullable();
            $table->integer('sawah_id');
            $table->enum('status', ['gadai', 'selesai'])->nullable();
            $table->string('keterangan')->nullable();
            $table->datetime('status_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_sawahs');
    }
}
