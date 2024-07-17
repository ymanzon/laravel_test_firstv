<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // clave, nombre, marca, usuario alta, fecha alta, fecha modificación,
        Schema::create('product_scheme', function (Blueprint $table) {
            $table->id();
            $table->string('clave');
            $table->string('nombre');
            $table->string('marca');
            $table->string('usuario_alta');
            $table->date('fecha_alta');
            $table->date('fecha_modificacion')->nullable();
            $table->binary('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_scheme');
    }
};
