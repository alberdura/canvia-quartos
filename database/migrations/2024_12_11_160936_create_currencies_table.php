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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->string('name');
            $table->string('symbol_native');
            $table->integer('decimal_digits');
            $table->integer('rounding');
            $table->string('code', 3); // Usamos un código corto (3 caracteres)
            $table->string('name_plural');
            $table->string('type');
            $table->json('countries'); // Esto almacena los países como un array JSON
            $table->double('value')->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
