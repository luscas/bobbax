<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioNoticia extends Model
{
    use HasFactory;

    protected $table = "noticias_coment";
}
