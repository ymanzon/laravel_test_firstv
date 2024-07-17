<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'log_scheme';
    protected $fillable = ['usuario','accion','fecha'];
    
    /*$table->string('usuario');
            $table->string('accion');
            $table->date('fecha'); */
}
