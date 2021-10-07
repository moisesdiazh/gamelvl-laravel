@extends('layouts.app')

@section('botones')

    <a class="btn btn-primary mr-2 text-white" href="{{ route('juegos.create') }}">Añadir Juego</a>
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
                <tr>
                    <td>1</td>
                    <td>BAMBOO RUSH</td>
                    <td>https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=806&lang=es</td>
                    <td>Juego mmorpg</td>
                    <td>https://winchiletragamonedas.com/public/images/games/bamboo_rush.jpeg</td>
                    <td>Disponible</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection