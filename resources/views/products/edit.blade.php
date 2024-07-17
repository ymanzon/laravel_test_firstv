@extends('layouts.app')

@section('title', 'Editar Usuario')
@section('content')


<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $product->nombre }}" required>
    </div>
    <div class="form-group">
        <label for="clave">Clave</label>
        <input type="clave" class="form-control" id="clave" name="clave" value="{{ $product->clave }}" required>
    </div>
    <div class="form-group">
        <label for="marca">Marca</label>
        <input type="marca" class="form-control" id="marca" name="marca" value="{{ $product->marca }}" required>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="activo" name="activo" {{ $product->activo ? 'checked' : '' }}>
        <label class="form-check-label" for="activo">Activo</label>
    </div>
    
    <input type="hidden" id="usuario_alta" name="usuario_alta" value="{{ $product->usuario_alta }}">

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
