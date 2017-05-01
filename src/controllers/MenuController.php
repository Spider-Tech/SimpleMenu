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
    public function __construct() {
        $this->current = Request::url();
        echo $this->current;
    }

    /**
     * Method to return Menu items
     *
     * @return array
     */
    public static function createMenu($arrayOfValues) {
        self::$items = collect($arrayOfValues);
        return self::sort();
    }

    public static function sort() {
        $Litems = self::$items;
        $sortedCollection = $Litems->sortBy('order');
        $newArray = array();
        foreach ($sortedCollection as $key => $value) {
            $newArray[$key] = Self::SortWithDynamicDepth($value);
        }
        return $newArray;
    }

    public static function SortWithDynamicDepth($array) {
        $finalArray = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if ($key == 'children') {
                    $finalArray[$key] = self::SortChildren($value, 'order');
                    $value = $finalArray[$key];
//                   unset($array);
                }
                    $finalArray[$key] = self::SortWithDynamicDepth($value);
                } else {
                if ($key == 'url') {
                    //        $finalArray['active'] = self::CheckUrlActive($value);
                }
                $finalArray[$key] = $value;
            }
        }
        return $finalArray;
    }

    public static function SortChildren($value, $type) {
        $child = collect($value);
        if ($child->isNotEmpty()) {
            return $child->sortBy($type)->toArray();
        } else {
            return $child->toArray();
        }
    }

    public static function CheckUrlActive($url) {
        print_r(self::$current);
//        print_r($url);
    }

}
