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
    public static function createMenu($arrayOfValues, $current) {
        self::$current = $current;
        self::$items = collect($arrayOfValues);
        self::$items = self::sort();
        return self::UpdateParentFromChild();
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

    public static function UpdateParentFromChild() {
        $collectionArray = collect(self::$items);
        return $collectionArray->each(function($k, $v) {
                    return self::UpdateParent($k);
                });
    }

    public static function UpdateParent($array) {
        $finalArray = array();
        if (is_array($array)) {
            print_r($array);
            foreach ($array as $key => $value) {
                if ($key['active'] == 'false') {
                    $key['active'] = self::UpdateParent($value);
                }
            }
        }
        return $array;
    }

}
