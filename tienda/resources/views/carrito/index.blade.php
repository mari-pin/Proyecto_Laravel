
@extends('plantilla')
@section('titulo', 'Carrito')
@section('contenido')

<h1>Carrito</h1>


<a href="{{route('postCarrito')}}">Añadir al Carrito</a>
<a href="{{route('putCarrito')}}">Modificar Carrito</a>
<a href="{{route('deleteCarrito')}}">Eliminar Carrito</a>


@endsection
{{$carritoVistas}}
