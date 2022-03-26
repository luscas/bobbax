<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menu";

    protected $with = ['submenu'];

    public function submenu() {
        return $this->hasMany(
            MenuSub::class,
            'id_menu',
            'id'
        );
    }
}
