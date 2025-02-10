@extends('plantilla')
@section('titulo', 'editar usuario')
@section('contenido')


<h1>Nuevo Usuario</h1>
<form class="w-50 text-center" action="{{route('users.store')}}" method="POST">

@csrf
@method('POST');

<div class="form-group">
    <label for="name">Nombre:</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
    @if ($errors->has('name'))
        <div class="text-danger">
            {{ $errors->first('name') }}
        </div>
    @endif
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="textarea" class="form-control" name="email" id="email" value="{{ old('email') }}">
    @if ($errors->has('email'))
        <div class="text-danger">
            {{ $errors->first('email') }}
        </div>
    @endif
</div>
<div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="textarea" class="form-control" name="password" id="password" value="{{ old('password') }}">
    @if ($errors->has('password'))
        <div class="text-danger">
            {{ $errors->first('password') }}
        </div>
    @endif
</div>
<div class="form-group">
    <label for="rol">Rol:</label>
    <input type="textarea" class="form-control" name="rol" id="rol" value="{{ old('rol') }}">
    @if ($errors->has('rol'))
        <div class="text-danger">
            {{ $errors->first('rol') }}
        </div>
    @endif
</div>


<input class="mt-2" type="submit" name="enviar" value="Enviar" class="btn btn-dark btn-block">
</form>

<a href="{{route('users.index')}}">Volver al inicio</a>
@endsection













