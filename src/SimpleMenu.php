<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace noob\simple_menu_laravel;
use Illuminate\Support\Facades\Request;

class SimpleMenu {

    protected $current = null;
    protected $items = null;

    public function __construct() {
        $this->current = Request::path();
   
    }

    public function GetMenu() {
        return controllers\MenuController::createMenu(config('menu'), $this->current);
    }

}
