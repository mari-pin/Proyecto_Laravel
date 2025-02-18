@extends('plantilla')
@section('titulo', 'mostar un producto')
@section('contenido')


<h1>Detalle de producto.{{ $producto->nombre}}</h1>
<div class="d-flex flex-column">
    <p>Nombre: {{ $producto->nombre }}</p><br>
    <p>Precio: {{ $producto->precio }}</p><br>
    <img class="w-25 h-25" src = "{{ $producto->imagen }}"/>
</div>

<form action="{{ route('postCarrito', $producto)}}" method="get" class="mb-5">
    @method('GET')
    @csrf
    <input type="number" value="1" min="1" name="valorInicial">
    <input type="submit" value="Añadir al carrito" class="btn btn-success">
</form>



@endsection
