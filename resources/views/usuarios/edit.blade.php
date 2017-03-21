@extends('layout')
@section('content')
<h2>Actualizar datos</h2>
<form method="POST" action="{{$usuario->id}}">

   {!! csrf_field()!!}
   @include('usuarios.formulario')
   <br>
    <button type="submit" class="btn btn-default">Actualizar</button>
</form>
@endsection
