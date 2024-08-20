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
        Schema::create('attemp_details', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->char('question_id', 36)->index();
            $table->char('answer_id', 36)->index();
            $table->char('attemp_id', 36);
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions')->cascadeOnDelete();
            $table->foreign('answer_id')->references('id')->on('answers')->cascadeOnDelete();
            $table->foreign('attemp_id')->references('id')->on('attemps')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attemp_details');
    }
};
