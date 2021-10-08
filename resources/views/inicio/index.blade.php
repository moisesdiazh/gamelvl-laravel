@extends('layouts.app')

@section('styles')

@endsection

@section('botones')

    <a class="btn btn-primary mr-2 text-white" href="{{ route('juegos.index') }}">Ir a administrar juegos</a>
@endsection

@section('content')

    <div class="container">

        <h2 class="titulo-categoria text text-uppercase ml-4">Juegos añadidos recientemente</h2>

        <div class="row">

            @foreach ($juegos as $juego)
            <div class="col-md-4">

                <div class="card-body">
                    <h3>{{ $juego->titulo }}</h3>
                </div>

                <div class="card">
                    <img src="/storage/{{ $juego->imagen }}" class="card-img-top">
                </div>

                <div class="card-body">
                    <h6>Link del juego: <a href="{{ $juego->url }}" target="_blank">{{ $juego->url }}</a> </h6>
                </div>

                <p>{{ Str::words(strip_tags($juego->descripcion), 20 ) }}</p>
            </div>

            @endforeach
        </div>
    </div>
@endsection