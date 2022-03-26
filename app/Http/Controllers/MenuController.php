<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function getMenu() {
        $menu_options = Menu::where(['status' => 'ativo'])->orderBy('ordem', 'ASC')->get();

        return $menu_options;
    }
}
