@extends('layouts.app')

@section('title', 'Crear Nuevo Producto');
@section('content')

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="clave">Clave</label>
        <input type="clave" class="form-control" id="clave" name="clave" required>
    </div>
    <div class="form-group">
        <label for="marca">Marca</label>
        <input type="marca" class="form-control" id="marca" name="marca" required>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="activo" name="activo">
        <label class="form-check-label" for="activo">Activo</label>
    </div>
    
    <input type="hidden" id="usuario_alta" name="usuario_alta" value="1">
    <input type="hidden" name="imagen" id="imagen">

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection