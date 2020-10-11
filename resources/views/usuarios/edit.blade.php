@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('usuarios.update', $user->id) }}" method="POST" class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Correo">
        </div>
        <div class="form-group">
            <select class="form-control" value="{{ $user->rol }}" name="rol">
                <option disabled>Seleccione Rol</option>
                <option value="Administrador" selected>Administrador</option>
                <option value="Usuario">Usuario</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
    </form>
</div>
@endsection