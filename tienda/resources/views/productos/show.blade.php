@extends('plantilla')
@section('titulo', 'mostar un producto')
@section('contenido')


<h1>Detalle de producto.{{ $producto->nombre}}</h1>
<div class="d-flex flex-column">
    <p>Nombre: {{ $producto->nombre }}</p><br>
    <p>Precio: {{ $producto->precio }}</p><br>
    <img class="w-25 h-25" src = "{{ $producto->imagen }}"/>
</div>

<a href="{{ route('productos.index') }}">Volver al Listado</a>

@endsection
