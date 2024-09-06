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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->date('dia_inicio');
            $table->date('dia_fin');
            $table->decimal('precio', 8, 2);
            $table->integer('duracion'); // Nuevo campo para duración en días
            $table->string('imagen');
            $table->string('departamento');
            $table->string('lugar');
            $table->timestamps();
        });
    }
    
  
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }

    
};
