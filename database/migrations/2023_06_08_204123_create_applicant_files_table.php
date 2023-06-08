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
        Schema::create('applicant_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_applicant')->references('id')->on('applicants')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('path');
            $table->string('file_name');
            $table->timestamps();
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_files');
    }
};
