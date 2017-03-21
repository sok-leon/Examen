@extends('layout')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@section('content')
  <h2>usuarios</h2>
  @if($usuarios)
              <table class="table">
                  <thead>
                      <tr>
                          <td>Nombres</td>
                          <td>Nick</td>
                          <td>Edad</td>
                          <td>Creado</td>
                          <td></td>
                      </tr>
                  </thead>
                  <tbody>

              @foreach($usuarios as $Usuario)
              <tr>
                <td>  {{$Usuario->nombre}} </td>
                <td>  {{$Usuario->nick}} </td>
                <td>  {{$Usuario->edad}} </td>
                <td>  {{$Usuario->created_at}} </td>
                <td>
                  <a href="{!! URL::to('/edit/'.$Usuario->id) !!}">Editar</a>
                  <br>
                  <a href="{!! URL::to('/eliminar/'.$Usuario->id) !!}">Eliminar</a>
                       </td>
              </tr>
            </tbody>
              @endforeach
            </table>
        @endif

@endsection
