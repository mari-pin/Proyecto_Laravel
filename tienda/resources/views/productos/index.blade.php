
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
        <td><img style="width: 100px; height:100px;" src ="{{ $producto->imagen }}" alt="{{$producto->nombre}}"></td>

        <td><a href="{{route('productos.show', $producto)}}"><button class="btn btn-success">Ver Producto</button></a></td>

    </tr>
@empty

@endforelse
</table>
@endsection



