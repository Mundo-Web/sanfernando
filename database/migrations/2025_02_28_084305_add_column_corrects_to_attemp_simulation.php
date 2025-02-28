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
        Schema::table('attemp_simulations', function (Blueprint $table) {
            $table->decimal('corrects', 8, 2)->default(0);
            $table->decimal('questions', 8, 2)->default(0)->change();
            $table->decimal('score', 8, 2)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attemp_simulations', function (Blueprint $table) {
            $table->dropColumn('corrects');
            $table->integer('questions')->default(0)->change();
            $table->integer('score')->default(0)->change();
        });
    }
};
