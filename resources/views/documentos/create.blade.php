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
    <form action="/cambio" method="POST" enctype="multipart/form-data" class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3">
        @csrf
        <div class="form-group">
            <select class="form-control" name="user">
                <option disabled>Seleccione Usuario</option>
                @foreach($users as $user)
                <option value="{{$user->id}}" selected>{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripción">
        </div>
        <div class="form-group">
            <label for="nombre">Documento</label>
            <input type="file" class="form-control" name="nombre" placeholder="Documento">
        </div>

        <button type="submit" class="btn btn-primary float-right">Asignar</button>
    </form>
</div>
@endsection