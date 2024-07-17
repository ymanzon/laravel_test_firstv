<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /*$table->string('clave');
    $table->string('nombre');
    $table->string('marca');
    $table->string('usuario_alta');
    $table->date('fecha_alta');
    $table->date('fecha_modificacion')->nullable();
    $table->binary('activo');/ */
    protected $table = 'product_scheme';
    protected $fillable = ['clave','nombre','marca','usuario_alta','fecha_alta','fecha_modificacion','activo'];
}
