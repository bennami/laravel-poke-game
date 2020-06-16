@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column text-center justify-content-center align align-items-center">
      <p>{{$pokemon->name}}</p>
      <img src="{{$pokemon->sprites->front_default}}" alt="" style="height: 100px; width: 100px">
      <p>{{$level}}</p>
        <form action="{{route('catchOrNot')}}" method="POST">
            @csrf
            <button class="btn-primary btn" name="catch">catch it</button>
            <button class="btn btn-danger" name="run">run</button>
            <input  hidden type="text" name="level" value="{{$level}}">
            <input  hidden type="text" name="pokeid" value="{{$pokemon->id}}">
        </form>
        <p> you have  {{Auth::user()->pokeballs}} pokeballs</p>
    </div>
@endsection
