<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index(){
        $pokemon  = Pokemon::with('user')
            ->where('userid',Auth::id())
            ->paginate(5);
        return view('inventory.inventory', [
            'pokemons'=> $pokemon,
        ]);
    }
}
