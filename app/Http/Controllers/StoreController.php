<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function buy(){
        $COSTOFPOKEBALL =  100;
        $user = Auth::user();
        if(isset($_POST['buy'])){
            if($user->money < $COSTOFPOKEBALL){
               return redirect()->back()
                   ->withErrors(['run'=> 'not enough money']);
            }else{
                $user->money -=  $COSTOFPOKEBALL;
                $user->pokeballs =+ 1;
                $user->save();
                return redirect()->back()
                    ->withErrors(['caught'=> 'pokeball bought']);
            }


        }
        if(isset($_POST['buy10'])){
            if($user->money <$COSTOFPOKEBALL *10){
                return redirect()->back()
                    ->withErrors(['run'=> 'not enough money']);
            }else{
                $user->money -=  $COSTOFPOKEBALL *10;
                $user->pokeballs =+ 10;
                $user->save();
                return redirect()->back()
                    ->withErrors(['caught'=> 'pokeball bought']);
            }


        }

    }
    public function sell(){
        $pokemon = Pokemon::find([$_POST['sell']])->first();
        $level = $pokemon->level;

        //meer geld voor high level pokemon
        $value = round($level * (5 + ($level/10) ));
        $user = Auth::user();
        $user->money += $value;
        Pokemon::destroy([$_POST['sell']]);
        $user->save();
        return redirect()->back()->withErrors(['caught'=> 'you sold pokemon']);



    }
    public function display(){
      return  view  ('store.store');
    }
}
