<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function index(){


        //obtenemos los juegos mas recientes
        $juegos = Game::latest()->limit(8)->get();

        return view('inicio.index', compact('juegos'));
    }
}
