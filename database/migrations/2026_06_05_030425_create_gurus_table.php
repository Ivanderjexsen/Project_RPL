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
    Schema::create('gurus', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('nip')->unique();
        $table->string('nama_lengkap');
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->string('no_telp')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('gurus');
}
};
