@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Documentos <a href="cambio/create"><button type="button" class="btn btn-primary float-right">Asignar Documento</button></a></h3>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Usuario</th>
                <th scope="col">Documento</th>
                <th scope="col">Descripción</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
            <tr>
                <th scope="row">{{$document->id}}</th>
                <td>{{$document->user}}</td>
                <td>{{$document->nombre}}</td>
                <td>{{$document->descripcion}}</td>
                <td>
                    <form action="{{ route('cambio.destroy', $document->id) }}" method="POST">
                        @csrf
                        @method('DELETE')   
                        <a href="{{ route('cambio.edit', $document->id) }}"><button type="button" class="btn btn-primary">Editar</button></a> 
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection