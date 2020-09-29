<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id');
            $table->integer('nip');
            $table->string('nama');
            $table->string('jk');
            $table->string('alamat');
            $table->string('agama');
            $table->date('tmt_pns');
            $table->string('kedudukan_pns');
            $table->string('status_pegawai');
            $table->date('tmt_cpns');
            $table->string('no_sk_cpns');
            $table->date('tgl_sk_cpns');
            $table->string('gol');
            $table->string('pangkat');
            $table->date('tmt_gol_terakhir');
            $table->integer('masa_kerja_tahun');
            $table->integer('masa_kerja_bulan');
            $table->string('jenis_jabatan');
            $table->string('nama_jabatan');
            $table->date('tmt_eselon');
            $table->date('tmt_jabatan');
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
        Schema::dropIfExists('pegawai');
    }
}
