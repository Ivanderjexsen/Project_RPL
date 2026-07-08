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
    Schema::create('mata_pelajarans', function (Blueprint $table) {
        $table->id();
        $table->string('kode_mapel')->unique();
        $table->string('nama_mapel');
        $table->integer('jam_per_minggu');
        $table->foreignId('guru_id')->constrained('gurus');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('mata_pelajarans');
}
};
