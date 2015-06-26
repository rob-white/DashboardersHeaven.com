<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Dashboarder's Heaven</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="{{ set_active_link('/', 'active') }}"><a href="{{ url('/') }}">HOME</a></li>
                <li class="{{ set_active_link('news', 'active') }}"><a href="{{ url('news') }}">NEWS</a></li>
                <li class="{{ set_active_link('members', 'active') }}"><a href="{{ url('members') }}">MEMBERS</a></li>
                <li class="{{ set_active_link('about', 'active') }}"><a href="{{ url('about') }}">ABOUT</a></li>
            </ul><!--/.nav .navbar-nav -->
        </div><!--/.nav-collapse -->
    </div>
</div>