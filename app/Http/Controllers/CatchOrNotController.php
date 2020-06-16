<?php

namespace App\Http\Controllers;

use App\Pokemon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CatchOrNotController extends Controller
{
    public function index (){
        if(isset($_POST['run'])){
            return redirect()->back()->withErrors(['run'=>'you ran away!!']);
        }
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/".$_POST['pokeid']."/")->object();
        $user = Auth::user();
        $level = $_POST['level'];
        if($user->pokeballs == 0){
            return redirect()->back()->withErrors(['run'=> 'not enough pokeballs']);
        }
        $user->pokeballs -= 1;
        $user->save();

        function saveToDB($response, $level){
            $user  = Auth::User();
            $pokemon  = new Pokemon();


            $pokemon->setName($response->name);
            $pokemon->setLevel($level);
            $pokemon->setId($pokemon->id);
            $pokemon->setSprite($response->sprites->front_default);
            $pokemon->setUserid($user->id);
            $pokemon->save();

        }
        $chance = 100 -  $level  +5;
        if($chance >  99){
            saveToDB($response,$level);
            return redirect()->back()->withErrors(['caught'=>"you caught em"]);
        }else{
            $random = random_int(1,100);
            if($random  >$chance){
                return redirect()->back()->withErrors(['run'=>"you didn't catch bro"]);
            }else{
                saveToDB($response,$level);
                return redirect()->back()->withErrors(['caught'=>"you caught em"]);
            }
        }


    }
}
