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
        //Nombre,email, usuario alta, fecha alta,fecha modificación, activo
        Schema::create('user_scheme', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->string('usuario_alta');
            $table->date('fecha_alta');
            $table->date('fecha_modificacion')->nullable();
            $table->string('imagen', 500);
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
        Schema::dropIfExists('user_scheme');
    }
};
