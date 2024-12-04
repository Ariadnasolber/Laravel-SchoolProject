<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id(); // ID del proyecto
        $table->string('name'); // Nombre del proyecto
        $table->text('description')->nullable(); // Descripción
        $table->date('deadline'); // Fecha límite
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con usuario
        $table->timestamps(); // created_at y updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
