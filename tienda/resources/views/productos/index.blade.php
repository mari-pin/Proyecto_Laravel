
@extends('plantilla')
@section('titulo', 'lista de productos')
@section('contenido')

<h1>Listado de Usuarios</h1>


<table>
    <tr>
        <th>nombre</th>
        <th>precio</th>
        <th>imagen</th>


    </tr>
@forelse ($productos as $producto)
    <tr>
        <td>{{ $producto->nombre }}</td>
        <td>{{ $producto->precio }}</td>
        <td><img style="width: 50px; height:50px;" src ="{{ $producto->imagen }}" alt="camiseta"></td>

        <td><a href="{{route('productos.show', $producto)}}">Ver Producto</a></td>

    </tr>
@empty

@endforelse
</table>
@endsection



