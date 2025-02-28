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
        Schema::create('attemp_simulations', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->boolean('finished')->default(false);
            $table->char('evaluation_id')->nullable();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id')->index();
	        $table->integer('questions')->default(0);
            $table->integer('score')->default(0);
           
            $table->foreign('evaluation_id')->references('id')->on('exam_simulations')->nullOnDelete();
            $table->foreign('course_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attemp_simulations');
    }
};
