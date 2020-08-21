<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGadaiSawahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gadai_sawahs', function (Blueprint $table) {
            $table->id();
            $table->string('periode');
            $table->integer('harga');
            $table->integer('admin_by')->nullable();
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
        Schema::dropIfExists('gadai_sawahs');
    }
}
