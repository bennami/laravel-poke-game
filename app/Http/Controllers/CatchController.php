<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CatchController extends Controller
{
    public function index(){

        $random=  random_int(1,151);
        $getresponse = Http::get("https://pokeapi.co/api/v2/pokemon/".$random."/")->object();

        return view('catch.catch',
        [
            'pokemon'=> $getresponse,
            'level'=> random_int(1,100),
        ]);
    }
}
