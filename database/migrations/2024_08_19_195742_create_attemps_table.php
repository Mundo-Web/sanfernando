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
        Schema::create('attemps', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->boolean('finished');
            $table->char('evaluation_id')->index();
            $table->unsignedBigInteger('course_id');
            $table->char('user_id')->index();
            $table->timestamps();

            $table->foreign('evaluation_id')->references('id')->on('modules');
            $table->foreign('course_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attemps');
    }
};
