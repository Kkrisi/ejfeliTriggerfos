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
            Schema::create('jogosultsags', function (Blueprint $table) {
                $table->id('jog_azon'); // Elsődleges kulcs jog_azon néven
                $table->string('megnevezes');
                $table->timestamps();

                //$table->check('jogosultsag_azon >= 0 AND jogosultsag_azon <= 10'); megszorítás hozzáadása
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogosultsag');
    }
};
