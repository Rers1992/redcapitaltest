@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Usuarios <a href="usuarios/create"><button type="button" class="btn btn-primary float-right">Agregar Usuario</button></a></h3>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Rol</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->rol}}</td>
                <td>
                    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')   
                        <a href="{{ route('usuarios.edit', $user->id) }}"><button type="button" class="btn btn-primary">Editar</button></a> 
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection