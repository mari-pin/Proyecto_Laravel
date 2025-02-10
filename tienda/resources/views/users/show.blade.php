@extends('plantilla')
@section('titulo', 'mostar un usuario')
@section('contenido')


<h1>Datos de un ususario</h1>
<div class="d-flex flex-column">
    <p>Nombre: {{ $user->name }}</p><br>
    <p>Email: {{ $user->email }}</p><br>
    <p>Contraseña: *******</p><br>
    <p>Rol: {{ $user->rol }}</p><br>
</div>

<a href="{{ route('users.edit', $user) }}"><button class="btn btn-success">Editar</button></a>
<form action={{ route('users.destroy', $user) }} method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Eliminar</button>

</form>
<a href="{{ route('users.index') }}">Volver al Listado</a>

@endsection
