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
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('G'); // Alterado para integer
            $table->integer('U'); // Alterado para integer
            $table->integer('T'); // Alterado para integer
            $table->integer('Total'); // Alterado para integer
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('G'); // Alterado para integer
            $table->integer('U'); // Alterado para integer
            $table->integer('T'); // Alterado para integer
            $table->integer('Total'); // Alterado para integer
        });
    }
};
