<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_barangs', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah');
            $table->integer('harga');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('keterangan')->nullable();
            $table->enum('jenis_bayar', ['tf', 'cod']);
            $table->string('bukti')->nullable();
            $table->enum('status', ['0','1']);
            $table->integer('barang_id');
            $table->integer('user_id');
            $table->integer('admin_id')->nullable();
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
        Schema::dropIfExists('transaksi_barangs');
    }
}
