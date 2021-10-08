<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'id', 'titulo', 'url', 'descripcion', 'imagen', 'estatus', 'user_id'
    ];


    public function usuarios()
    {

        return $this->belongsTo(User::class);
    }
}
