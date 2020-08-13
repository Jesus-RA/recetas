<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Receta extends Model
{
    protected $fillable = [
        'titulo',
        'ingredientes',
        'preparacion',
        'user_id',
        'categoria_id',
        'imagen',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categoria(){
        return $this->hasOne(Categoria::class, 'categoria_id');
    }
}
