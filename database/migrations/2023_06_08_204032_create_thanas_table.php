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
        Schema::create('thanas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('id_division')->references('id')->on('divisions')->constrained()->cascadeOnDelete();
            $table->foreignId('id_district')->references('id')->on('districts')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanas');
    }
};
