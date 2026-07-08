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
    Schema::create('siswas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('nis')->unique();
        $table->string('nama_lengkap');
        $table->foreignId('kelas_id')->constrained('kelas');
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->date('tanggal_lahir')->nullable();
        $table->string('tempat_lahir')->nullable();
        $table->text('alamat')->nullable();
        $table->string('no_telp')->nullable();
        $table->string('nama_orang_tua')->nullable();
        $table->string('no_telp_orang_tua')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('siswas');
}
};
