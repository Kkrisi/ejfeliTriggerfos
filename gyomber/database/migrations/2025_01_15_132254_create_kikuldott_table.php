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
        Schema::create('kikuldott', function (Blueprint $table) {
            $table->bigIncrements('kuldott_azon'); // Elsődleges kulcs
            $table->unsignedBigInteger('penzugy_azon'); // Hivatkozás a pénzügyi táblára
            $table->string('email'); // A kiküldött email cím
            $table->string('pdf_fajl_neve'); // A PDF fájl neve, amit kiküldtek
            $table->dateTime('kuldes_datuma'); // A kiküldés időpontja
            $table->timestamps();
        
            // Külső kulcsok
            $table->foreign('penzugy_azon')->references('penzugy_azon')->on('elokeszites')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kikuldott');
    }
};
