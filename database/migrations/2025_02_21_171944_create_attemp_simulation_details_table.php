<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attemp_simulation_details', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->char('question_id')->index();
            $table->char('answer_id')->index();
            $table->uuid('attemp_id');
            $table->timestamps();
            
            $table->foreign('question_id')->references('id')->on('question_exams')->cascadeOnDelete();
            $table->foreign('answer_id')->references('id')->on('response_exams')->cascadeOnDelete();
            $table->foreign('attemp_id')->references('id')->on('attemp_simulations')->cascadeOnDelete();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attemp_simulation_details');
    }
};
