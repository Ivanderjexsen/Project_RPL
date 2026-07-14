<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('landings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->json('features')->nullable();
            $table->json('info_cards')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('landings');
    }
};
