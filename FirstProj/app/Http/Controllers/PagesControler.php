<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesControler extends Controller
{
    public function home()
    {
    	return view("home");
    }
    public function about()
    {
    	return view("about");
    }


}
