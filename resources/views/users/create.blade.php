@extends('layouts.app')

@section('title', 'Crear Nuevo Usuario');
@section('content')

<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="image">Imagen</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="activo" name="activo">
        <label class="form-check-label" for="activo">Activo</label>
    </div>
    
    <input type="hidden" id="usuario_alta" name="usuario_alta" value="1">
    
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection