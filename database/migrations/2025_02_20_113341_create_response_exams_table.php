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
        Schema::create('response_exams', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->char('question_id');
            $table->string('response');
            $table->text('description')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('is_correct')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('question_exams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('response_exams');
    }
};
