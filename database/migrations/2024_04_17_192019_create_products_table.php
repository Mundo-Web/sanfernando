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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->default(DB::raw('(UUID())'));
            $table->string('producto');
            $table->string('extract')->nullable();
            $table->text('description')->nullable();
            $table->decimal('precio', 12, 2)->default(0);
            $table->decimal('descuento', 12, 2)->default(0);
            $table->decimal('stock', 12, 2)->default(0);
            $table->decimal('costo_x_art', 12, 2)->default(0);
            $table->string('peso')->nullable();
            $table->string('imagen')->nullable();
            $table->json('atributes')->nullable();
            $table->string('sku')->nullable();
            $table->boolean('destacar')->default(false);
            $table->boolean('recomendar')->default(false);
           
            $table->unsignedBigInteger('categoria_id')->nullable();

            $table->boolean('visible')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
