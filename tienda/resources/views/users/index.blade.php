
@extends('plantilla')
@section('titulo', 'lista de usuarios')
@section('contenido')

<h1>Listado de Usuarios</h1>

<th><a href="{{route('users.create')}}"><button class="btn btn-primary">Insertar Nuevo Usuario</button></a></th>
<table class="text-center">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>


    </tr>
@forelse ($users as $user)
    <tr class="pe-5" >
        <td class="mx-5">{{ $user->name }}</td>
        <td class="mx-5">{{ $user->email }}</td>
        <td class="mx-5">{{ $user->rol }}</td>
        <td class="mx-5"><a href="{{route('users.edit', $user)}}"><button class="btn btn-primary m-2">Modificar Usuario</button></a></td>
        <td class="mx-5"><form action={{ route('users.destroy', $user) }} method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger m-2">Eliminar</button>

        </form></td>

        <td class="m-5"><a href="{{route('users.show', $user)}}"><button class="btn btn-success m-2">Ver Usuario</button></a></td>

    </tr>
@empty

@endforelse
</table>
@endsection



