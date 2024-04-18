<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{


    static function getSelect()
    {
        $list=Country::select()->orderBy('code','asc')->get();
        $return=[];

		$return['']=__('please select');
        foreach($list as $element)
        {
            $return[$element->id]=$element->full_name;
        }

        return $return;
    }
}
