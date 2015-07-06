@extends('app')

@section('title')
    Profile
@endsection

@section('header')
    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>{{ $gamer->gamertag }}</h3>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /blue -->
@endsection

@section('content')
    <div class="container mtb">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 centered">
                <h2>{{ $gamer->motto }}</h2>
                <br>
                <div class="hline"></div>
            </div>
        </div>
    </div><! --/container -->
@endsection