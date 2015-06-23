@extends('app')

@section('title')
    Home
@endsection

@section('header')
    <!-- Section 1 (Header) -->
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3>Lorem Ipsum</h3>
                    <h1>Carousel of Newest Clips?</h1>
                    <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>
                    <h5>More Lorem Ipsum added here too.</h5>
                </div>
                <div class="col-lg-8 col-lg-offset-2 himg">
                    {{--<img src="assets/img/browser.png" class="img-responsive">--}}
                </div>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /headerwrap -->
@endsection

@section('content')

    <!-- Section 2 -->
    <div id="service">
        <div class="container">
            <div class="row centered">
                <div class="col-md-4">
                    <i class="fa fa-heart-o"></i>
                    <h4>Handsomely Crafted</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p><br/><a href="#" class="btn btn-theme">More Info</a></p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-flask"></i>
                    <h4>Retina Ready</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p><br/><a href="#" class="btn btn-theme">More Info</a></p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-trophy"></i>
                    <h4>Quality Theme</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p><br/><a href="#" class="btn btn-theme">More Info</a></p>
                </div>
            </div>
        </div><! --/container -->
    </div><! --/service -->

    <!-- Section 3 -->
    <div class="container mtb">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-1">
                <h4>More About Our Agency.</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                <p><br/><a href="about.html" class="btn btn-theme">More Info</a></p>
            </div>

            <div class="col-lg-3">
                <h4>Frequently Asked</h4>
                <div class="hline"></div>
                <p><a href="#">How cool is this theme?</a></p>
                <p><a href="#">Need a nice good-looking site?</a></p>
                <p><a href="#">Is this theme retina ready?</a></p>
                <p><a href="#">Which version of Font Awesome uses?</a></p>
                <p><a href="#">Free support is integrated?</a></p>
            </div>

            <div class="col-lg-3">
                <h4>Latest Posts</h4>
                <div class="hline"></div>
                <p><a href="single-post.html">Our new site is live now.</a></p>
                <p><a href="single-post.html">Retina ready is not an option.</a></p>
                <p><a href="single-post.html">Bootstrap 3 framework is the best.</a></p>
                <p><a href="single-post.html">You need this theme, buy it now.</a></p>
                <p><a href="single-post.html">This theme is what you need.</a></p>
            </div>

        </div><! --/row -->
    </div><! --/container -->

    <!-- Section 4 -->
    <div id="cwrap">
        <div class="container">
            <div class="row centered">
                <h3>OUR CLIENTS</h3>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    {{--<img src="assets/img/clients/client01.png" class="img-responsive">--}}
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    {{--<img src="assets/img/clients/client02.png" class="img-responsive">--}}
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    {{--<img src="assets/img/clients/client03.png" class="img-responsive">--}}
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    {{--<img src="assets/img/clients/client04.png" class="img-responsive">--}}
                </div>
            </div><! --/row -->
        </div><! --/container -->
    </div><! --/cwrap -->

@endsection