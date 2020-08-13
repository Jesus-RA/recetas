<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function recetas(){
        return $this->belongsToMany(Receta::class, 'categoria_id');
    }
}
