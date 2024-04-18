<?php

namespace App\Http\Controllers;

use App\Traits\PageParamsView;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use PageParamsView;

    public function index()
    {

        return view('home.index')->with('pageParams',$this->getPageParams());
    }


    public function home()
    {

        return view('home.home')->with('pageParams',$this->getPageParams());
    }
}
