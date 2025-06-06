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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Campo autoincremental
            $table->string('title');
            $table->string('poster');
            $table->boolean('habilitated')->default(false); // Campo booleano con valor por defecto false
            $table->text('content');

            // Clave foránea a users
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');

            // Clave foránea a categories
            $table->foreignId('id_category')->constrained('categories')->onDelete('cascade');

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts'); // Elimina la tabla al hacer rollback
    }
};
