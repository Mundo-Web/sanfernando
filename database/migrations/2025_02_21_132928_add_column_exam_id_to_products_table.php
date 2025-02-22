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
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_exam')->default(false);
            $table->char('examsimulation_id')->nullable();
            $table->foreign('examsimulation_id')->references('id')->on('exam_simulations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['examsimulation_id']);
            $table->dropColumn('examsimulation_id');
            $table->dropColumn('is_exam');
        });
    }
};
