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
    <form action="{{ route('cambio.update', $document->id) }}" method="POST" class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3">
        @method('PATCH')
        @csrf
        <label>Usuario Actual: {{ $user->name }}</label>
        <div class="form-group">
            <select class="form-control" value="{{ $document->user }}" name="user">
                <option disabled>Seleccione Usuario</option>
                @foreach($users as $user)
                <option value="{{$user->id}}" selected>{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" name="descripcion" value="{{ $document->descripcion}}" placeholder="Descripción">
        </div>
        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
    </form>
</div>
@endsection