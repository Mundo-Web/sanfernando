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
        Schema::create('modules', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->unsignedBigInteger('course_id');
            $table->string('type')->default('session');
            $table->text('name');
            $table->longText('description')->nullable();
            $table->string('source_type')->nullable();
            $table->string('source')->nullable();
            $table->integer('order')->default(0);
            $table->integer('duration')->nullable();
            $table->integer('attemps')->nullable();
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('products')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
