<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggajiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('karyawan_id');
            $table->integer('jumlah_gaji');
            $table->integer('jumlah_lembur');
            $table->integer('jumlah_cuti');
            $table->integer('total_gaji');
            $table->foreign('karyawan_id')
                ->references('id')
                ->on('karyawan')
                ->onDelete('cascade');
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
        Schema::dropIfExists('penggajian');
    }
}
