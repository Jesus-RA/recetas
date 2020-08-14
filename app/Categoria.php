<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Receta;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function recetas(){
        return $this->hasMany(Receta::class, 'categoria_id');
    }
}
