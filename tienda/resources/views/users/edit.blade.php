@extends('plantilla')
@section('titulo', 'editar usuario')
@section('contenido')

    <h1>Editar un Usuario</h1>
    <form action="{{ route('users.update', $user) }}" method="post">

        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input class="form-control" type="text" name="name" value="{{ $user->name }}"><br>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="text" name="email" value="{{ $user->email }}"><br>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="text" name = "password"><br>
        </div>
        <div class="form-group">
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" class="form-select">
                <option value="admin">Admin</option>
                <option value="user" selected>User</option>
            </select>
        </div>
        <input class="form-control" type="submit" value="enviar" class="btn btn-dark btn-block">
    </form>

    <a href="{{ route('users.index', $user) }}">Volver al Listado</a>

@endsection
