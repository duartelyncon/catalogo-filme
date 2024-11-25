<?php
// COMMENTS NO CÓDIGO PARA ESTUDO E FIXAÇÃO

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    public function movies (){
        return $this->hasMany(Movie::class); // um genero tem muitos filmes
    }
}