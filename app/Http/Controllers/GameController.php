<?php

namespace App\Http\Controllers;

use App\Game;
use Facades\Intervention\Image\Facades\Image as FacadesImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
// use Image;





class GameController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Auth::user()->juegos->dd();

        $juegos = auth()->user()->juegos;

        return view('juegos.index')->with('juegos', $juegos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $juegos = DB::table('games')->get()->pluck('titulo', 'url', 'descripcion', 'estatus');
        return view('juegos.create')->with('games', $juegos);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());

        //validación en el formulario
        $data = request()->validate([
            'titulo' => 'required|min:2',
            'url' => 'required|min:10',
            'descripcion' => 'required|min:10',
            'imagen' => 'required|image',
            'estatus' => 'required',
        ]);

        //obtenemos la ruta de la imagen
        $ruta_imagenes = $request['imagen']->store('upload-games', 'public');

        //hacemos el resize de las imagenes
        $img = Image::make(public_path("storage/{$ruta_imagenes}"))->fit(1000, 550);
        $img->save(); //guardamos

        // DB::table('games')->insert([
        //     'titulo' => $data['titulo'],
        //     'url' => $data['url'],
        //     'descripcion' => $data['descripcion'],
        //     'imagen' => $ruta_imagenes,
        //     'estatus' => $data['estatus'],
        //     'user_id' => Auth::user()->id,
        // ]);

        auth()->user()->juegos()->create([
            'titulo' => $data['titulo'],
            'url' => $data['url'],
            'descripcion' => $data['descripcion'],
            'imagen' => $ruta_imagenes,
            'estatus' => $data['estatus'],
            'user_id' => Auth::user()->id,
        ]);
        
        //redireccionamos al index luego de enviar el formulario
        return redirect()->action('GameController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
        

        $juegos = Game::all(['id', 'titulo']);
        
         return view('juegos.edit', compact('juegos', 'game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //validación en el formulario
        $data = request()->validate([
            'titulo' => 'required|min:2',
            'url' => 'required|min:10',
            'descripcion' => 'required|min:10',
            'estatus' => 'required',
        ]);

        //asignamos los valores
        $game->titulo = $data['titulo'];
        $game->url = $data['url'];
        $game->descripcion = $data['descripcion'];
        $game->estatus = $data['estatus'];

        //solo si el usuario sube una nueva imagen
        if(request('imagen')){
            $ruta_imagenes = $request['imagen']->store('upload-games', 'public');

            //hacemos el resize de las imagenes
            $img = Image::make(public_path("storage/{$ruta_imagenes}"))->fit(1000, 550);
            $img->save();

            $game->imagen = $ruta_imagenes;
        }

        $game->save();
        return redirect()->action('GameController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->action('GameController@index');
    }
}
