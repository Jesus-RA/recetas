<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categoria;

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

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $dates = [
        'created_at'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
