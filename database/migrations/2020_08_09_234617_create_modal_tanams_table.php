<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalTanamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modal_tanams', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_bibit');
            $table->string('jenis_pupuk');
            $table->string('periode_tanam');
            $table->enum('status', ['0', '1']);
            $table->integer('sawah_id');
            $table->integer('admin_id');
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
        Schema::dropIfExists('modal_tanams');
    }
}
