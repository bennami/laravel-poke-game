@extends('layouts.app')
@section('content')
    <form action="{{route('buy')}}" method="post" class="d-flex justify-content-center">
        @csrf
        <div class="d-flex flex-column align-items-center">
            <p>pokeball</p>
            <img src="https://seeklogo.com/images/P/pokeball-logo-DC23868CA1-seeklogo.com.png" style="height: 100px;width: 100px" alt="">
            <p>100</p>
            <button class="btn  btn-info" name="buy">buy pokeball</button>
            <button class="btn  btn-info" name="buy10">buy 10</button>
        </div>
    </form>
@endsection
