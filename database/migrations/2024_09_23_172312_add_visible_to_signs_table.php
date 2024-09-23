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
        Schema::table('signs', function (Blueprint $table) {
            //name,occupation
            $table->string('name')->nullable(true)->change();
            $table->string('occupation')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('signs', function (Blueprint $table) {
            //
            $table->string('name')->nullable(false)->change();
            $table->string('occupation')->nullable(false)->change();
        });
    }
};
