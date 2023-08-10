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
        Schema::create('courrier_envs', function (Blueprint $table) {
            $table->id();
            $table->string('type_courr');
            $table->text('objet');
            $table->string('destination');
            $table->string('source');
            $table->string('titre');
            $table->date('date');
            $table->unsignedBigInteger('id_piece');
            $table->foreign('id_piece')->references('id')->on('piece_jointes')->onDelete('cascade');
            $table->unsignedBigInteger('id_service');
            $table->foreign('id_service')->references('id')->on('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courrier_envs');
    }
};
