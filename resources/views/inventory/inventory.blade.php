@extends('layouts.app')
@section('content')
    <div style="display: flex" class="justify-content-center">

        @foreach($pokemons as $pokemon)
            <div class="text-center d-flex flex-column justify-items-center m-3 p-3">
            <p>{{$pokemon->name}}</p>
                <p>{{$pokemon->level}}</p>
                <img src="{{$pokemon->sprite}}"  style="width: 100px; height: 100px" alt="">
                <form action="{{route('sell', $pokemon)}}" method="post">
                    @csrf
                    <button class="btn btn-info m-2" name="sell" value="{{$pokemon->id}}">sell for {{round($pokemon->level * ($pokemon->level/10))}} $</button>
                </form>
            </div>
    @endforeach

    </div>
    <div  class="d-flex justify-content-center m-2">
        {{$pokemons->links()}}
    </div >
@endsection
