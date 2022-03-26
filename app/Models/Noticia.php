<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $table = 'noticias';

    protected $hidden = ['cat_id'];

    protected $with = ['categoria'];

    public function categoria() {
        return $this->belongsTo(
            NoticiaCat::class,
            'cat_id',
            'id'
        );
    }
}
