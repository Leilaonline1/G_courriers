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
        Schema::create('archive_courrier_recus', function (Blueprint $table) {
            $table->id();
            $table->date('date_archivage');
            $table->unsignedBigInteger('id_courrR');
            $table->foreign('id_courrR')->references('id')->on('courrier_recus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archive_courrier_recus');
    }
};