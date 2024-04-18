<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{

    static $defaultLanguage='fr';
    static function getSelect()
    {
        $list=Language::select()->orderBy('code','asc')->get();
        $return=[];
        $return['']=__('please select');
        foreach($list as $element)
        {
            $return[$element->id]=$element->code;
        }

        return $return;
    }
}
