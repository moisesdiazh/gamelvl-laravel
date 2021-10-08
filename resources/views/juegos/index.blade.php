@extends('layouts.app')

@section('botones')

    <a class="btn btn-primary mr-2  text-white" href="{{ route('inicio.index') }}">Home</a>
    <a class="btn btn-primary mr-2  text-white" href="{{ route('juegos.create') }}">Añadir Juego</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Administra tus juegos</h2>


    <div class="col-md-10 mx-auto bg-white p-3">

        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Id del juego</th>
                    <th scole="col">Nombre del juego</th>
                    <th scole="col">Url del juego</th>
                    <th scole="col">Descripción del Juego</th>
                    <th scole="col">Url de la imagen del juego</th>
                    <th scole="col">Estatus del juego</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($juegos as $juego)                   
                    <tr>
                        <td>{{ $juego->id }}</td>
                        <td>{{ $juego->titulo }}</td>
                        <td><a href="{{ $juego->url }}" target="_blank">{{ $juego->url }}</a></td>
                        <td>{!! $juego->descripcion !!}</td>
                        <td><img src="/storage/{{ $juego->imagen }}" class="w-100"></td>
                        <td>{{ $juego->estatus }}</td>
                        <td>
                            <a href="{{ route('juegos.edit', ['game' => $juego->id ]) }}" class="btn btn-dark d-block mb-2">Editar</a>
                            <form action="{{ route('juegos.destroy', ['game' => $juego->id ]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger d-block" value="Eliminar &times;">
                            </form>

                        </td>
                    </tr>
                @endforeach 

            </tbody>
        </table>
    </div>
@endsection