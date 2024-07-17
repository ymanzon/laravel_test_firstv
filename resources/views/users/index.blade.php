@extends('layouts.app')

@section('title', 'Lista de usuarios');
@section('content')

<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>
<form method="GET" action="{{ route('users.index') }}" class="mb-4">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ request('nombre') }}">
        </div>
        <div class="form-group col-md-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ request('email') }}">
        </div>
        <div class="form-group col-md-2">
            <label for="created_by">Usuario Alta</label>
            <input type="text" class="form-control" id="created_by" name="created_by" value="{{ request('created_by') }}">
        </div>
        <div class="form-group col-md-2">
            <label for="created_at">Fecha Alta</label>
            <input type="date" class="form-control" id="created_at" name="created_at" value="{{ request('created_at') }}">
        </div>
        <div class="form-group col-md-2">
            <label for="updated_at">Fecha Modificación</label>
            <input type="date" class="form-control" id="updated_at" name="updated_at" value="{{ request('updated_at') }}">
        </div>
        <div class="form-group col-md-2">
            <label for="activo">Activo</label>
            <select class="form-control" id="activo" name="activo">
                <option value="">Todos</option>
                <option value="1" {{ request('activo') == '1' ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ request('activo') == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Usuario Alta</th>
                    <th>Fecha Alta</th>
                    <th>Fecha Modificación</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td> <img src="{{URL::asset($user->imagen)}}" alt="profile Pic" height="200" width="200"></td>
                        <td>{{ $user->nombre }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_by }}</td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <td>{{ $user->updated_at->format('d/m/Y') }}</td>
                        <td>{{ $user->activo ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                            <form action="{{ route('users.toggleActive', $user) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">
                                    {{ $user->is_active ? 'Deshabilitar' : 'Habilitar' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @endsection