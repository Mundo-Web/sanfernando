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
        Schema::create('exam_question', function (Blueprint $table) {
            $table->id();
            $table->char('exam_simulation_id');
            $table->char('question_exam_id');
            $table->decimal('score', 8, 2)->default(0);
            $table->timestamps();

            $table->foreign('exam_simulation_id')->references('id')->on('exam_simulations')->onDelete('cascade');
            $table->foreign('question_exam_id')->references('id')->on('question_exams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_question');
    }
};
