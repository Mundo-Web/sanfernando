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
            // Primero eliminamos la restricción foreign key existente
            $table->dropForeign(['evaluation_id']);
            
            // Luego creamos la nueva con nullOnDelete
            $table->foreign('evaluation_id')
                ->references('id')
                ->on('modules')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attemps', function (Blueprint $table) {
            // En el rollback, volvemos a la versión anterior
            $table->dropForeign(['evaluation_id']);
            
            $table->foreign('evaluation_id')
                ->references('id')
                ->on('modules');
        });
    }
};
