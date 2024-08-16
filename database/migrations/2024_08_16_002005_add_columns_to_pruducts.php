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
            //
            $table->json('beneficios')->nullable();
            $table->json('curso_dirigido')->nullable();
            $table->text('description2')->nullable();
            $table->json('temario')->nullable();
            $table->json('incluye')->nullable();
            $table->json('que_lograras')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn('beneficios');
            $table->dropColumn('curso_dirigido');
            $table->dropColumn('description2');
            $table->dropColumn('temario');
        });
    }
};
