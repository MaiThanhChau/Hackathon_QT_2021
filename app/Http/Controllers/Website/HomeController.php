<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index(){       
        return view('website.index');
    }
    public function input(Request $request){       
        $input = $request->input;
        if( 
    }
}
