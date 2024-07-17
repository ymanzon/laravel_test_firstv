@extends('layouts.app')
@section('page_name', 'Home');
@section('title', 'Eventos');
@section('content')

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Accion</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->usuario }}</td>
                        <td>{{ $event->accion }}</td>
                        <td>{{ $event->fecha }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection