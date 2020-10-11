@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/usuarios" method="POST" class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" class="form-control" name="email" placeholder="Correo">
        </div>
        <div class="form-group">
            <select class="form-control" name="rol">
                <option disabled>Seleccione Rol</option>
                <option value="Administrador" selected>Administrador</option>
                <option value="Usuario">Usuario</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary float-right">Agregar</button>
    </form>
</div>
@endsection