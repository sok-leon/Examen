@extends('layout')
@section('content')
  <h1>Registro de Usuarios</h1>
  @if(! $errors->isEmpty())
    <div class="alert alert-danger">
      <p><strong>Error!</strong>No se puede registrar</p>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <h4><a href="{{ url('/principal')}}">Listar usuarios</a></h4>
  <hr>

  <form method="POST" action="crear">
     {!! csrf_field()!!}

     @include('usuarios.formulario')
     <br>
      <button type="submit" class="btn btn-default">Registrar</button>
  </form>
@endsection
