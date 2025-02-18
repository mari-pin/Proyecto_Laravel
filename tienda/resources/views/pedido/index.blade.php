@extends('plantilla')
@section('titulo', 'Pedido completado')
@section('contenido')

    <h1>Pedido Completado</h1>

  <p>Id Pedido:{{$pedido->id}}</p>
  <p>Nombre:{{$pedido->name}}</p>
  <p>Id cliente:{{$pedido->id_user}}</p>


  <h2>Datos Pedido</h2>

    <Table class="table">
        <thead>

            <td class="col">Nombre</td>
            <td class="col">Cantidad</td>
            <td class="col">Precio Unidad</td>
            <td class="col">Total</td>


        </thead>


            @forelse($pedido->lineaPedido as $lineaPedido)

            <tr>

              <td>{{$lineaPedido->nombre_producto}}</td>
              <td>{{$lineaPedido->cantidad_producto}}</td>
              <td>{{$lineaPedido->precio_unidad}}</td>
              <td>{{$lineaPedido->precio_total}}</td>
            </tr>

            @empty


            @endforelse

            <tr>
                <td colspan="3">Total</td>
                <td colspan="2">{{$pedido->lineaPedido->sum('precio_total')}}</td>
            </tr>

    </Table>

    <a href="{{route('productos.index')}}"><button class="btn btn-success">Volver al inicio</button></a>





@endsection
