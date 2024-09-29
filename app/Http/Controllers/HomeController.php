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

    public function about()
    {
        return view('home.about')->with('pageParams',$this->getPageParams());
    }

    public function termOfUse()
    {
        return view('home.term-of-use')->with('pageParams',$this->getPageParams());
    }

    public function contact()
    {
        return view('home.contact')->with('pageParams',$this->getPageParams());
    }

    public function changeLanguage()
    {
        return view('home.change-language')->with('pageParams',$this->getPageParams());
    }

    public function changeCountry()
    {
        return view('home.change-country')->with('pageParams',$this->getPageParams());
    }
}
