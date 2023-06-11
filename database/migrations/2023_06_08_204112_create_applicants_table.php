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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name');
            $table->string('email')->unique();
            $table->longText('address_details');
            $table->json('programming_language');
            $table->enum('has_training',['yes','no']);
            $table->foreignId('id_division')->references('id')->on('divisions')->constrained()->cascadeOnDelete();
            $table->foreignId('id_district')->references('id')->on('districts')->constrained()->cascadeOnDelete();
            $table->foreignId('id_thana')->references('id')->on('thanas')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->index('applicant_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
