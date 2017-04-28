<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace noob\simple_menu_laravel;

use Illuminate\Support\Facades\Facade;

class SimpleMenuFacade extends Facade
{
    protected static function getFacadeAccessor() { 
        return 'Simple-Menu';
    }
}