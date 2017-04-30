<?php

namespace noob\simple_menu_laravel\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller {

    protected static $items = null;
    protected $current = null;
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
                $finalArray[$key] = array(self::SortWithDynamicDepth($value));
                if ($key == 'children') {
                    $finalArray[$key] = self::SortChildren($value);
                }
            } else {
                $finalArray[$key] = $value;
            }
        }
        return $finalArray;
    }

    public static function SortChildren($value) {
        $child = collect($value);
        if ($child->isNotEmpty()) {
            return $child->sortBy('order')->toArray();
        } else {
            return $child->toArray();
        }
    }

}
