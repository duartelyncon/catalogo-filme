<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'synopsis', 'release_date', 'genre_id'];

    public function genre(){
        return $this->belongsTo(Genre::class); //filme pertence a um genero (belongsTo = Pertence)
    }

    public function reviews() {
        return $this->hasMany(Review::class); // um filme tem varios reviews (hasMany = Tem muitos(a))
    }
}
