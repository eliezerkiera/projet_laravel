<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    static function getSelect()
    {
        $list=Currency::select()->orderBy('code','asc')->get();
        $return=[];
	$return['']=__('please select');
        foreach($list as $element)
        {
            $return[$element->id]=$element->full_name;
        }

        return $return;
    }
}
