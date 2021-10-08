@extends('layouts.app')

@section('styles') 
{{-- agregando trix --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')

    <a class="btn btn-primary mr-2 text-white" href="{{ route('juegos.index') }}">Volver a administrar juegos</a>
@endsection

@section('content')


    <h2 class="text-center mb-5">Editar juego: {{ $game->titulo }}</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">

            <form method="POST" action="{{ route('juegos.update', ['game' => $game->id]) }}" enctype="multipart/form-data" novalidate>

                @csrf 

                @method('PUT')

                <div class="form-group">

                    <label for="titulo">Titulo del Juego</label>
                    <input type="text" 
                        name="titulo" 
                        class="form-control @error('titulo') is-invalid @enderror" 
                        id="titulo" 
                        placeholder="Titulo del Juego"
                        value="{{ $game->titulo }}"
                    >
                    {{-- validaciones --}}
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 


                <div class="form-group">

                    <label for="url">Url del juego</label>
                    <input type="text" 
                        name="url" 
                        class="form-control @error('url') is-invalid @enderror" 
                        id="url" 
                        placeholder="Url del juego"
                        value="{{ $game->url }}"
                    >

                    {{-- validaciones --}}
                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 


                <div class="form-group mt-3">

                    <label for="descripcion">Descripción del Juego</label>
                    <input type="hidden" 
                        name="descripcion" 
                        id="descripcion" 
                        value="{{ $game->descripcion }}"
                    >

                    <trix-editor 
                            class="form-control @error('descripcion') is-invalid @enderror" 
                            input="descripcion">
                    </trix-editor>

                {{-- validaciones --}}
                    @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                </div> 




                <div class="form-group mt-3">

                    <label for="imagen">Url de la imagen del juego</label>
                    <input type="file" 
                        name="imagen" 
                        class="form-control @error('imagen') is-invalid @enderror" 
                        id="imagen" 
                        value="{{ $game->imagen }}"
                    >

                    <div class="mt-4">
                        <p>Imagen del juego actual:</p> 

                        <img src="/storage/{{$game->imagen}}" style="width: 300px">
                    </div>
                    {{-- validaciones --}}
                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 


                <div class="form-group">

                    <label for="estatus">Estatus</label>
                    <select name="estatus" id="estatus" class="form-control @error('estatus') is-invalid @enderror" >

                        <option>--Coloque una opción-- </option>
                        <option>Disponible</option>
                        <option>No disponible</option>
                    </select>

                    {{-- validación para status --}}
                    @error('estatus')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    
                {{-- boton de agregar --}}
                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="Agregar">
                </div>

                </div>
            </form>
        </div>

    </div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection