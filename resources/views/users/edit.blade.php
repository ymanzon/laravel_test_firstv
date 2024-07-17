@extends('layouts.app')

@section('title', 'Editar Usuario')
@section('content')


<form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $user->nombre }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
    </div>
    <div class="form-group">
        <label for="image">Imagen</label>
        <input type="file" class="form-control-file" id="image" name="image">
        @if ($user->imagen)
            <img src="{{URL::asset($user->imagen)}}" alt="Imagen de {{ $user->nombre }}" width="100">
        @endif
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="activo" name="activo" {{ $user->activo ? 'checked' : '' }}>
        <label class="form-check-label" for="activo">Activo</label>
    </div>
    
    <input type="hidden" id="usuario_alta" name="usuario_alta" value="{{ $user->usuario_alta }}">
    <input type="hidden" name="imagen" id="imagen" value="{{ $user->imagen }}">

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
