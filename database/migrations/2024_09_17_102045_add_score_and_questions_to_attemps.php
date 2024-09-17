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
        Schema::table('attemps', function (Blueprint $table) {
            $table->integer('questions')->default(0);
            $table->integer('score')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attemps', function (Blueprint $table) {
            $table->dropColumn([
                'questions',
                'score'
            ]);
        });
    }
};
