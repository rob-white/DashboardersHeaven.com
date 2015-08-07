@extends('app')

@section('title')
    {{ $gamer->gamertag }}'s Clips
@endsection

@section('header')
    <div id="blue">
        <div class="container">
            <div class="row centered">
                <h3>{{ $gamer->gamertag }}'s Clips</h3>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /blue -->
@endsection

@section('content')
    <div class="container mtb">
        <div class="row centered">
            @foreach($clips as $index => $clip)
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <a href="{{ route('clip', [$gamer->id, $clip->id]) }}">
                        <img src="{{ $clip->thumbnail_small }}" alt="clip-{{ $clip->id }} thumbnail">
                    </a>
                    <h4>@if( ! empty($clip->name)) {{ $clip->name }} in @endif{{ $clip->game->title }}</h4>
                </div>
            @if($index !== 0 && ($index + 1) % 4 === 0)
        </div>
        <div class="row centered">
            @endif
            @endforeach
        </div><!-- portfolio container -->
        <div class="row centered">
            {!! $clips->render() !!}
        </div>
    </div><!--/Portfoliowrap -->
@endsection