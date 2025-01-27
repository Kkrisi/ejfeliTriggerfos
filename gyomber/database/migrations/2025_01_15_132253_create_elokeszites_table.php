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
        Schema::create('elokeszites', function (Blueprint $table) {
            $table->bigIncrements('penzugy_azon'); // Elsődleges kulcs
            $table->unsignedBigInteger('dolgozo_azon'); // Hivatkozás a dolgozó táblára
            $table->timestamps();
        
            // Külső kulcs a dolgozók táblára
            $table->foreign('dolgozo_azon')->references('d_azon')->on('dolgozos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elokeszites');
    }
};
