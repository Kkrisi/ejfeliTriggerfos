<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cimeks', function (Blueprint $table) {
            $table->bigIncrements('cim_azon'); // Címek tábla elsődleges kulcsa
            $table->unsignedBigInteger('d_azon'); // A dolgozókhoz való kapcsolódás
            $table->string('ir_szam_alando');
            $table->string('telepules_allando');
            $table->string('utca_allando');
            $table->string('hazszam_allando');
            $table->string('ir_szam_id')->nullable(); //nem kötelező adatot tárolni benne = ->nullable()
            $table->string('telepules_id')->nullable();
            $table->string('utca_id')->nullable();
            $table->string('hazszam_id')->nullable();
            $table->timestamps();

            // Külső kulcs a dolgozók táblához
            $table->foreign('d_azon')->references('d_azon')->on('dolgozos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cimeks');
    }
};
