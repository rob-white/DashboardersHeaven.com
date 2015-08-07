@extends('app')

@section('title')
    {{ $gamer->gamertag }}'s Profile
@endsection

@section('header')
    <div id="blue">
        <div class="container">
            <div class="row centered">
                <div class="col-md-4">
                    <h3>
                        {{ $gamer->gamertag }}
                    </h3>
                </div>
                <div class="col-md-4">
                    <h3><i class="fa fa-star"></i> {{ $gamer->level }}</h3>
                </div>
                <div class="col-md-4">
                    <h3><i class="fa fa-trophy"></i> {{ number_format($gamer->gamerscore) }}</h3>
                </div>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /blue -->
@endsection

@section('content')

    <div class="container mtb">
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive img-thumbnail" src="{{ url($gamer->display_pic) }}" alt="Gamer Pic">
            </div>
            <div class="col-md-6">
                <h4>BIO</h4>
                <p>{{ $gamer->bio }}</p>
            </div>
        </div><!-- /row ---->
    </div>
    <hr>
    <div id="content-container" class="container mtb">
        <div class="row centered">
            <div class="col-md-12">
                <h3 class="mb">GAMERSCORE HISTORY</h3>
                <div id="gamerscore-history" class="row">
                    <div id="gamerscore-history-chart" class="col-md-11"></div>
                    <div id="gamerscore-history-legend" class="col-md-1"></div>
                </div>
            </div>
        </div><!-- --/row ---->
    </div>
    <div id="cwrap">
        <div class="container centered">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    @if($gamer->motto)
                        <i class="fa fa-comment-o"></i>
                        <p>"{{ $gamer->motto }}"</p>
                    @else
                        <i class="fa fa-meh-o"></i>
                        <p>This member has no motto...</p>
                    @endif
                </div>
            </div><!-- /row ---->
        </div><!-- /container ---->
    </div>

@endsection

@section('scripts')
    <script type="application/javascript">
        (function($) {

            var $el = {
                chartContainer: $('#gamerscore-history-chart')
            };
            var chart = ScatterChart();
            var CHART_HEIGHT = 275;
            var DATE_FORMAT = d3.time.format("%Y-%m-%d %H:%M:%S");
            var COLORS = d3.scale.ordinal().range(['#384452']);

            // Blarg
            $.ajax({
                url: "../api/v1/gamerscores/" + {{ $gamer->id }} + "",
                type: "GET",
                async: true,
                success: function(data){
                    renderChart(data);
                }
            });

            $(window).on('resize', function(){
               resizePageElements();
            });

            function renderChart(data){

                chart
                    .rootNode(d3.select('#content-container')) // For tooltip
                    .width($el.chartContainer.width())
                    .height(CHART_HEIGHT)
                    .margin({ top: 10, right: 5, bottom: 40, left: 30 })
                    .dataId(function(d){
                        // Column that makes a row unique
                        return d['id'];
                    })
                    .x(function (d) {
                        // X axis value column
                        return DATE_FORMAT.parse(d['created_at']);
                    })
                    .y(function (d) {
                        // Y axis value column
                        return d['score'];
                    })
                    .xTickFormat(function (d) {
                        var format = d3.time.format('%m/%d');
                        return format(d);
                    })
                    .color(COLORS)
                    .yAxisLabel('Gamerscore')
                    .xAxisLabel('Date')
                    .showLegend(true)
                    .showGrid(true)
                    .legendContainer('#gamerscore-history-legend')
                    .groupBy(function (d) {
                        // Colors data/creates legend by this column
                        return d['gamer_id'];
                    });

                d3.select('#' + $el.chartContainer.attr('id'))
                    .datum(data)
                    .call(chart);

                //resizePageElements();
            }

            // Resize width of chart when pages resizes
            function resizePageElements() {
                if(chart){
                    d3.select('#' + $el.chartContainer.attr('id'))
                        .call(chart
                                .width($el.chartContainer.width())
                                .height(CHART_HEIGHT)
                                .x(function (d) {
                                    return DATE_FORMAT.parse(d['created_at']);
                                })
                                .y(function (d) {
                                    return d['score'];
                                }));
                }
            }
        })($);
    </script>
@endsection