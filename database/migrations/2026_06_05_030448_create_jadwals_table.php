<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('jadwals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kelas_id')->constrained('kelas');
        $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajarans');
        $table->foreignId('guru_id')->constrained('gurus');
        $table->enum('hari', ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']);
        $table->time('jam_mulai');
        $table->time('jam_selesai');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('jadwals');
}
};
