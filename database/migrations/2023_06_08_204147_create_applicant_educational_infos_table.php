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
        Schema::create('applicant_educational_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_applicant')->references('id')->on('applicants')->constrained()->cascadeOnDelete();
            $table->string('exam_name');
            $table->string('university');
            $table->string('board');
            $table->timestamps();
            $table->index('exam_name');
            $table->index('university');
            $table->index('board');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_educational_infos');
    }
};
