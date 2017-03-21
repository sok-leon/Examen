<input type="hidden" name="_token" value="{{ csrf_token() }}">
@if(isset($usuario))
    <div class="form-group">
        <label for="exampleInputEmail1">Nombres</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombres"  value="{{ $usuario->nombre }}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Nick</label>
        <input type="text" name="nick" class="form-control" placeholder="nick" value="{{ $usuario->nick }}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Edad</label>
        <input type="number" name="edad" class="form-control" placeholder="edad"  min="1" max="100" value="{{ $usuario->edad }}">
    </div>

@else
    <div class="form-group">
        <label for="exampleInputEmail1">Nombres</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombres" value="{{old('nombre')}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Nick</label>
        <input type="text" name="nick" class="form-control" placeholder="Nick" value="{{old('nick')}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Edad</label>
        <input type="number" name="edad" class="form-control" placeholder="edad"  min="1" max="100" value="{{old('edad')}}">
    </div>
@endif
<div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password"  >
