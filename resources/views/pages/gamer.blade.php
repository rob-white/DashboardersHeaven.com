@extends('app')

@section('title')
    Members
@endsection

@section('header')
    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>We rage quit often.</h3>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /blue -->
@endsection

@section('content')

    <div class="container mtb">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 centered">
                <h2>Our Members.</h2>
                <br>
                <div class="hline"></div>
            </div>
        </div>
    </div><! --/container -->

    <div id="portfoliowrap">
        <div class="portfolio-centered">
            <div class="recentitems portfolio">

                @foreach($gamers as $gamer)
                    <div class="portfolio-item graphic-design">
                        <div class="he-wrap tpl6">
                            <img class="hidden" src="{{ url($gamer->display_pic) }}" alt="Gamer Pic">
                            <div class="he-view">
                                <div class="bg a0" data-animate="fadeIn">
                                    <h3 class="a1" data-animate="fadeInDown">{{ $gamer->gamertag }}</h3>
                                    <a href="{{ url('/members/'.$gamer->gamertag.'/clips') }}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-video-camera"></i></a>
                                    <a href="{{ url('/members/'.$gamer->gamertag) }}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-user"></i></a>
                                </div><!-- he bg -->
                            </div><!-- he view -->
                        </div><!-- he wrap -->
                    </div><!-- end col-12 -->
                @endforeach

            </div><!-- portfolio -->
        </div><!-- portfolio container -->
    </div><!--/Portfoliowrap -->
@endsection