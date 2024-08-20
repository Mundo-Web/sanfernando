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
        Schema::create('attemp_details', function (Blueprint $table) {
            $table->id();
            $table->char('question_id', 36)->index();
            $table->char('answer_id', 36)->index();
            $table->char('attemp_id', 36);
            $table->timestamps();
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
