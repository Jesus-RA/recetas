<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Perfil extends Model
{

    protected $fillable = [
        'biografia',
        'imagen'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
