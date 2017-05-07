<?php

namespace noob\simple_menu_laravel\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller {

    protected static $items = null;
    protected static $current = null;
    protected $currentkey = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Method to return Menu items
     *
     * @return array
     */
    public static function createMenu($arrayOfValues, $current) {
        self::$current = $current;
        self::$items = collect($arrayOfValues);
        self::$items = self::sort();
      //  self::UpdateParent(self::$items);
        return self::updateParent(self::$items);
    }

    public static function sort() {
        $Litems = self::$items;
        $sortedArray = self::SortChildren($Litems, 'order');
        return Self::SortWithDynamicDepth($sortedArray);
    }

    public static function SortWithDynamicDepth($array) {
        $finalArray = array();
        $isActive = false;
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $finalArray[$key] = self::SortChildren($value, 'order');
                $value = $finalArray[$key];
                $finalArray[$key] = self::SortWithDynamicDepth($value);
                
            } else {
                if ($key == 'url') {
                    $finalArray['active'] = self::CheckUrlActive($value);
                }
                
                $finalArray[$key] = $value;
            }
        }
        return $finalArray;
    }

    public static function SortChildren($value, $type) {
        $child = collect($value);
        if ($child->isNotEmpty()) {
            $child->each(function($k, $v) {
                if ($k == 'url') {
                    $child->put('active', self::CheckUrlActive($v));
                }
            });
            return $child->sortBy($type)->toArray();
        } else {
            return $child->toArray();
        }
    }

    public static function CheckUrlActive($menuUrl) {
        $url = trim(self::$current, '/');
        if ($menuUrl === $url) {
            return true;
        } else {
            return false;
        }
    }

   public static function updateParent($array){
      $array = array_reverse($array,true);
      return $array;
   }

   

}
