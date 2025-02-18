@extends('plantilla')
@section('titulo', 'Carrito')
@section('contenido')

    <h1>Carrito</h1>


    <Table class="table">
        <thead>
            <td class="col">Nombre</td>
            <td class="col">Cantidad</td>
            <td class="col">Precio Unidad</td>
            <td class="col">Total</td>
            <td class="col" colspan="2">Acciones</td>

        </thead>


            @forelse($carritoVistas as $lineaCarrito)
            <tr>

                <td class="col">

                    {{ $lineaCarrito['nombre_producto'] }}
                </td>
                <td class="col">
                   <form action="{{route('putCarrito')}}" method="GET">
                    @method('GET')
                    @csrf

                    <input type="number" min="1" value="{{ $lineaCarrito['cantidad_producto']}}" name="cantidad_producto" >
                    <input type="text" hidden value="{{ $lineaCarrito['id_producto']}}" name="id_producto">
                    <input type="submit" value="Modificar">

                   </form>

                </td>
                <td class="col"> {{ $lineaCarrito['precio_producto'] }}</td>

                <td> {{ $lineaCarrito['cantidad_producto'] * $lineaCarrito['precio_producto'] }}</td>

                <td class="col"><a href="{{route('deleteCarrito', $lineaCarrito)}}">Eliminar</a></td>

            </tr>
            @empty


            @endforelse

            <tr>
                <td colspan="3">Total</td>
                <td colspan="2">{{$totalPrecio}}</td>
            </tr>

    </Table>
     <a href="{{route('confirmarPedido')}}"><button class="btn btn-success">Confirmar Pedido</button></a>

     <a href="{{route('productos.index')}}"><button class="btn btn-primary">Seguir comprando</button></a>


@endsection
