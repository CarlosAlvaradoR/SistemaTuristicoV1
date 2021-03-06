@extends('layouts/plantilladashboard')

@section('tituloPagina','Reportes | Paquetes')
    
@section('contenido')
<header class="page-content-header widgets-header">
    <div class="container-fluid">
        <div class="tbl tbl-outer">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="title">Pageviews</div>
                                <div class="amount color-blue">20 750 000</div>
                                <div class="amount-sm">20 750 000</div>
                            </div>
                            <div class="tbl-cell tbl-cell-progress">
                                <div class="circle-progress-bar-typical size-56 pieProgress"
                                     role="progressbar" data-goal="79"
                                     data-barcolor="#00a8ff"
                                     data-barsize="10"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                    <span class="pie_progress__number">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="title">Pages/Visit</div>
                                <div class="amount">2,4</div>
                                <div class="amount-sm">2,3</div>
                            </div>
                            <div class="tbl-cell tbl-cell-progress">
                                <div class="circle-progress-bar-typical size-56 pieProgress"
                                     role="progressbar" data-goal="75"
                                     data-barcolor="#929faa"
                                     data-barsize="10"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                    <span class="pie_progress__number">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="title">Visit Duration</div>
                                <div class="amount">2m23s</div>
                                <div class="amount-sm">2m10s</div>
                            </div>
                            <div class="tbl-cell tbl-cell-progress">
                                <div class="circle-progress-bar-typical size-56 pieProgress"
                                     role="progressbar" data-goal="75"
                                     data-barcolor="#929faa"
                                     data-barsize="10"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                    <span class="pie_progress__number">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="title">Revenue</div>
                                <div class="amount">N/A</div>
                                <div class="amount-sm">N/A</div>
                            </div>
                            <div class="tbl-cell tbl-cell-progress">
                                <div class="circle-progress-bar-typical size-56 pieProgress"
                                     role="progressbar" data-goal="75"
                                     data-barcolor="#929faa"
                                     data-barsize="10"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                    <span class="pie_progress__number">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><!--.page-content-header-->

<div class="container-fluid">
    <div class="row">
        <div class="col-xxl-3 col-md-6">
            <section class="widget">
                <header class="widget-header-dark">Tasks Completed</header>
                <div class="tab-content widget-tabs-content">
                    <div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
                        <div class="circle-progress-bar-typical pieProgress"
                             role="progressbar" data-goal="79"
                             data-barcolor="#00a8ff"
                             data-barsize="10"
                             aria-valuemin="0"
                             aria-valuemax="100">
                            <span class="pie_progress__number">0%</span>
                        </div>
                    </div>
                    <div class="tab-pane" id="w-1-tab-2" role="tabpanel">
                        <center>Tasks</center>
                    </div>
                    <div class="tab-pane" id="w-1-tab-3" role="tabpanel">
                        <center>Event</center>
                    </div>
                </div>
                <div class="widget-tabs-nav bordered">
                    <ul class="tbl-row" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#w-1-tab-1" role="tab">
                                <i class="font-icon font-icon-chart-3"></i>
                                Chart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#w-1-tab-2" role="tab">
                                <i class="font-icon font-icon-notebook-lines"></i>
                                Tasks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#w-1-tab-3" role="tab">
                                <i class="font-icon font-icon-pin"></i>
                                Event
                            </a>
                        </li>
                    </ul>
                </div>
            </section><!--.widget-->

            <section class="widget top-tabs">
                <header class="widget-header-dark">Tasks Completed</header>
                <div class="widget-tabs-nav bordered">
                    <ul class="tbl-row" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#wt-1-tab-1" role="tab">
                                <i class="font-icon font-icon-chart-3"></i>
                                Chart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#wt-1-tab-2" role="tab">
                                <i class="font-icon font-icon-notebook-lines"></i>
                                Tasks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#wt-1-tab-3" role="tab">
                                <i class="font-icon font-icon-pin"></i>
                                Event
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content widget-tabs-content">
                    <div class="tab-pane active" id="wt-1-tab-1" role="tabpanel">
                        <div class="circle-progress-bar-typical pieProgress"
                             role="progressbar" data-goal="79"
                             data-barcolor="#00a8ff"
                             data-barsize="10"
                             aria-valuemin="0"
                             aria-valuemax="100">
                            <span class="pie_progress__number">0%</span>
                        </div>
                    </div>
                    <div class="tab-pane" id="wt-1-tab-2" role="tabpanel">
                        <center>Tasks</center>
                    </div>
                    <div class="tab-pane" id="wt-1-tab-3" role="tabpanel">
                        <center>Event</center>
                    </div>
                </div>
            </section>

            <section class="widget">
                <header class="widget-header-dark">Tasks Completed</header>
                <div class="tab-content widget-tabs-content">
                    <div class="tab-pane active" id="w-2-tab-1" role="tabpanel">
                        <div class="circle-progress-bar-typical pieProgress"
                             role="progressbar" data-goal="79"
                             data-barcolor="#00a8ff"
                             data-barsize="10"
                             aria-valuemin="0"
                             aria-valuemax="100">
                            <span class="pie_progress__number">0%</span>
                        </div>
                    </div>
                    <div class="tab-pane" id="w-2-tab-2" role="tabpanel">
                        <center>Tasks</center>
                    </div>
                    <div class="tab-pane" id="w-2-tab-3" role="tabpanel">
                        <center>Event</center>
                    </div>
                </div>
                <div class="widget-tabs-nav colored">
                    <ul class="tbl-row" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link green active" data-toggle="tab" href="#w-2-tab-1" role="tab">
                                <i class="font-icon font-icon-chart-3"></i>
                                Chart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link blue" data-toggle="tab" href="#w-2-tab-2" role="tab">
                                <i class="font-icon font-icon-notebook-lines"></i>
                                Tasks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link orange" data-toggle="tab" href="#w-2-tab-3" role="tab">
                                <i class="font-icon font-icon-pin"></i>
                                Event
                            </a>
                        </li>
                    </ul>
                </div>
            </section><!--.widget-->
        </div>

        <div class="col-xxl-3 col-md-6">
            <section class="widget widget-tabs-compact">
                <div class="tab-content widget-tabs-content">
                    <div class="tab-pane active" id="w-3-tab-1" role="tabpanel">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo tbl-cell-photo-64">
                                    <a href="#">
                                        <img src="img/avatar-1-128.png" alt="">
                                    </a>
                                </div>
                                <div class="tbl-cell">
                                    <p class="user-card-row-name font-16"><a href="#">Gerald Davidson</a></p>
                                    <p class="user-card-row-mail font-14"><a href="#">Company Founder</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="w-3-tab-2" role="tabpanel">
                        <center>Content 2</center>
                    </div>
                    <div class="tab-pane" id="w-3-tab-3" role="tabpanel">
                        <center>Content 3</center>
                    </div>
                </div>
                <div class="widget-tabs-nav bordered">
                    <ul class="tbl-row" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#w-3-tab-1" role="tab">
                                <i class="font-icon font-icon-heart"></i>
                                2 719
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#w-3-tab-2" role="tab">
                                <i class="font-icon font-icon-users-two"></i>
                                5 386
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#w-3-tab-3" role="tab">
                                <i class="font-icon font-icon-eye"></i>
                                24 953
                            </a>
                        </li>
                    </ul>
                </div>
            </section><!--.widget-tabs-compact-->

            <section class="widget widget-tabs-compact">
                <div class="tab-content widget-tabs-content">
                    <div class="tab-pane active" id="w-4-tab-1" role="tabpanel">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo tbl-cell-photo-64">
                                    <a href="#">
                                        <img src="img/avatar-1-128.png" alt="">
                                    </a>
                                </div>
                                <div class="tbl-cell">
                                    <p class="user-card-row-name font-16"><a href="#">Gerald Davidson</a></p>
                                    <p class="user-card-row-mail font-14"><a href="#">Company Founder</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="w-4-tab-2" role="tabpanel">
                        <center>Content 2</center>
                    </div>
                    <div class="tab-pane" id="w-4-tab-3" role="tabpanel">
                        <center>Content 3</center>
                    </div>
                </div>
                <div class="widget-tabs-nav colored">
                    <ul class="tbl-row" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
                                <i class="font-icon font-icon-heart"></i>
                                2 719
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link orange" data-toggle="tab" href="#w-4-tab-2" role="tab">
                                <i class="font-icon font-icon-users-two"></i>
                                5 386
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
                                <i class="font-icon font-icon-eye"></i>
                                24 953
                            </a>
                        </li>
                    </ul>
                </div>
            </section><!--.widget-tabs-compact-->

            <section class="widget widget-time">
                <header class="widget-header-dark with-btn">
                    Time is Money!
                    <button type="button" class="widget-header-btn">
                        <i class="font-icon font-icon-plus"></i>
                    </button>
                </header>
                <div class="widget-time-content">
                    <div class="count-item">
                        <div class="count-item-number">05</div>
                        <div class="count-item-caption">hour</div>
                    </div>
                    <div class="count-item divider">:</div>
                    <div class="count-item">
                        <div class="count-item-number">24</div>
                        <div class="count-item-caption">min</div>
                    </div>
                    <div class="count-item divider">:</div>
                    <div class="count-item">
                        <div class="count-item-number">19</div>
                        <div class="count-item-caption">sec</div>
                    </div>
                </div>
            </section><!--.widget-time-->

            <section class="widget widget-time aquamarine">
                <header class="widget-header-dark with-btn">
                    Time is Money!
                    <button type="button" class="widget-header-btn">
                        <i class="font-icon font-icon-plus"></i>
                    </button>
                </header>
                <div class="widget-time-content">
                    <div class="count-item">
                        <div class="count-item-number">05</div>
                        <div class="count-item-caption">hour</div>
                    </div>
                    <div class="count-item divider">:</div>
                    <div class="count-item">
                        <div class="count-item-number">24</div>
                        <div class="count-item-caption">min</div>
                    </div>
                    <div class="count-item divider">:</div>
                    <div class="count-item">
                        <div class="count-item-number">19</div>
                        <div class="count-item-caption">sec</div>
                    </div>
                </div>
            </section><!--.widget-time-->

            <section class="widget top-tabs">
                <header class="widget-header-dark">Tasks Completed</header>
                <div class="widget-tabs-nav colored">
                    <ul class="tbl-row" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link green active" data-toggle="tab" href="#wt-2-tab-1" role="tab">
                                <i class="font-icon font-icon-chart-3"></i>
                                Chart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link blue" data-toggle="tab" href="#wt-2-tab-2" role="tab">
                                <i class="font-icon font-icon-notebook-lines"></i>
                                Tasks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link orange" data-toggle="tab" href="#wt-2-tab-3" role="tab">
                                <i class="font-icon font-icon-pin"></i>
                                Event
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content widget-tabs-content">
                    <div class="tab-pane active" id="wt-2-tab-1" role="tabpanel">
                        <div class="circle-progress-bar-typical pieProgress"
                             role="progressbar" data-goal="79"
                             data-barcolor="#00a8ff"
                             data-barsize="10"
                             aria-valuemin="0"
                             aria-valuemax="100">
                            <span class="pie_progress__number">0%</span>
                        </div>
                    </div>
                    <div class="tab-pane" id="wt-2-tab-2" role="tabpanel">
                        <center>Tasks</center>
                    </div>
                    <div class="tab-pane" id="wt-2-tab-3" role="tabpanel">
                        <center>Event</center>
                    </div>
                </div>
            </section>
        </div>

        <div class="clearfix hidden-xxl-up"></div>

        <div class="col-xxl-3 col-md-6">
            <div class="row">
                <div class="col-xs-6">
                    <section class="widget widget-simple-sm-fill">
                        <div class="widget-simple-sm-icon">
                            <i class="font-icon font-icon-facebook"></i>
                        </div>
                        <div class="widget-simple-sm-fill-caption">98K Likes</div>
                    </section>
                </div><!--.widget-simple-sm-fill-->
                <div class="col-xs-6">
                    <section class="widget widget-simple-sm-fill red">
                        <div class="widget-simple-sm-icon">
                            <i class="font-icon font-icon-server"></i>
                        </div>
                        <div class="widget-simple-sm-fill-caption">3 Servers</div>
                    </section>
                </div><!--.widget-simple-sm-fill-->
            </div><!--.row-->

            <div class="row">
                <div class="col-xs-6">
                    <section class="widget widget-simple-sm-fill green">
                        <div class="widget-simple-sm-icon">
                            <i class="font-icon font-icon-facebook"></i>
                        </div>
                        <div class="widget-simple-sm-fill-caption">98K Likes</div>
                    </section><!--.widget-simple-sm-fill-->
                </div>
                <div class="col-xs-6">
                    <section class="widget widget-simple-sm-fill orange">
                        <div class="widget-simple-sm-icon">
                            <i class="font-icon font-icon-server"></i>
                        </div>
                        <div class="widget-simple-sm-fill-caption">3 Servers</div>
                    </section><!--.widget-simple-sm-fill-->
                </div>
            </div><!--.row-->

            <div class="row">
                <div class="col-xs-6">
                    <section class="widget widget-simple-sm-fill purple">
                        <div class="widget-simple-sm-icon">
                            <i class="font-icon font-icon-facebook"></i>
                        </div>
                        <div class="widget-simple-sm-fill-caption">98K Likes</div>
                    </section><!--.widget-simple-sm-fill-->
                </div>
                <div class="col-xs-6">
                    <section class="widget widget-simple-sm-fill grey">
                        <div class="widget-simple-sm-icon">
                            <i class="font-icon font-icon-server"></i>
                        </div>
                        <div class="widget-simple-sm-fill-caption">3 Servers</div>
                    </section><!--.widget-simple-sm-fill-->
                </div>
            </div><!--.row-->

            <div class="row">
                <div class="col-xs-6">
                    <section class="widget widget-simple-sm">
                        <div class="widget-simple-sm-icon">
                            <i class="font-icon font-icon-cloud-download color-green"></i>
                        </div>
                        <div class="widget-simple-sm-bottom">98K Likes</div>
                    </section><!--.widget-simple-sm-->
                </div>
                <div class="col-xs-6">
                    <section class="widget widget-simple-sm">
                        <div class="widget-simple-sm-icon">
                            <i class="font-icon font-icon-bookmark color-purple"></i>
                        </div>
                        <div class="widget-simple-sm-bottom">
                            <a href="#">760 Bookmarks</a>
                        </div>
                    </section><!--.widget-simple-sm-->
                </div>
            </div><!--.row-->

            <div class="row">
                <div class="col-xs-6">
                    <section class="widget widget-simple-sm">
                        <div class="widget-simple-sm-icon">
                            <i class="font-icon font-icon-twitter color-blue"></i>
                        </div>
                        <div class="widget-simple-sm-bottom">35K Followers</div>
                    </section><!--.widget-simple-sm-->
                </div>
                <div class="col-xs-6">
                    <section class="widget widget-simple-sm">
                        <div class="widget-simple-sm-icon">
                            <i class="font-icon font-icon-wp color-black-blue"></i>
                        </div>
                        <div class="widget-simple-sm-bottom">
                            <a href="#">15 Themes</a>
                        </div>
                    </section><!--.widget-simple-sm-->
                </div>
            </div><!--.row-->

            <div class="row">
                <div class="col-xs-12">
                    <section class="widget top-tabs widget-tabs-compact">
                        <div class="widget-tabs-nav bordered">
                            <ul class="tbl-row" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#w-3-tab-1" role="tab">
                                        <i class="font-icon font-icon-heart"></i>
                                        2 719
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#w-3-tab-2" role="tab">
                                        <i class="font-icon font-icon-users-two"></i>
                                        5 386
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#w-3-tab-3" role="tab">
                                        <i class="font-icon font-icon-eye"></i>
                                        24 953
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content widget-tabs-content">
                            <div class="tab-pane active" id="w-3-tab-1" role="tabpanel">
                                <div class="user-card-row">
                                    <div class="tbl-row">
                                        <div class="tbl-cell tbl-cell-photo tbl-cell-photo-64">
                                            <a href="#">
                                                <img src="img/avatar-1-128.png" alt="">
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <p class="user-card-row-name font-16"><a href="#">Gerald Davidson</a></p>
                                            <p class="user-card-row-mail font-14"><a href="#">Company Founder</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="w-3-tab-2" role="tabpanel">
                                <center>Content 2</center>
                            </div>
                            <div class="tab-pane" id="w-3-tab-3" role="tabpanel">
                                <center>Content 3</center>
                            </div>
                        </div>
                    </section>

                    <section class="widget top-tabs widget-tabs-compact">
                        <div class="widget-tabs-nav colored">
                            <ul class="tbl-row" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link red active" data-toggle="tab" href="#wt-4-tab-1" role="tab">
                                        <i class="font-icon font-icon-heart"></i>
                                        2 719
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link orange" data-toggle="tab" href="#wt-4-tab-2" role="tab">
                                        <i class="font-icon font-icon-users-two"></i>
                                        5 386
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link blue" data-toggle="tab" href="#wt-4-tab-3" role="tab">
                                        <i class="font-icon font-icon-eye"></i>
                                        24 953
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content widget-tabs-content">
                            <div class="tab-pane active" id="wt-4-tab-1" role="tabpanel">
                                <div class="user-card-row">
                                    <div class="tbl-row">
                                        <div class="tbl-cell tbl-cell-photo tbl-cell-photo-64">
                                            <a href="#">
                                                <img src="img/avatar-1-128.png" alt="">
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <p class="user-card-row-name font-16"><a href="#">Gerald Davidson</a></p>
                                            <p class="user-card-row-mail font-14"><a href="#">Company Founder</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="wt-4-tab-2" role="tabpanel">
                                <center>Content 2</center>
                            </div>
                            <div class="tab-pane" id="wt-4-tab-3" role="tabpanel">
                                <center>Content 3</center>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-md-6">
            <section class="widget widget-weather">
                <div class="widget-weather-big">
                    <div class="icon">
                        <i class="font-icon font-icon-weather-clouds"></i>
                    </div>
                    <div class="info">
                        <div class="degrees">29??</div>
                        <div class="weather">Cloudy</div>
                    </div>
                </div>
                <div class="widget-weather-content widget-weather-slider">
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">Now</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-cloud"></i>
                            <div class="degrees">29??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">10:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-cloud-circles"></i>
                            <div class="degrees">28??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">11:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-cloud-drops-lightning"></i>
                            <div class="degrees">27??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">12:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-cloud-moon"></i>
                            <div class="degrees">26??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">13:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-cloud-one-circle"></i>
                            <div class="degrees">28??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">14:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-cloud-sun"></i>
                            <div class="degrees">15??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">15:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-cloud-one-drop"></i>
                            <div class="degrees">28??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">16:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-cloud-rain-snow"></i>
                            <div class="degrees">28??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">17:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-cloud-two-circles"></i>
                            <div class="degrees">12??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">18:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-cloud-two-drops"></i>
                            <div class="degrees">28??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">19:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-cloud-two-snow"></i>
                            <div class="degrees">28??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">20:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-clound-lightning"></i>
                            <div class="degrees">28??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">21:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-funnel"></i>
                            <div class="degrees">28??</div>
                        </div>
                    </div>
                    <div class="widget-weather-item">
                        <div class="widget-weather-item-time">22:00</div>
                        <div class="widget-weather-item-info">
                            <i class="font-icon font-icon-weather-thermometer"></i>
                            <div class="degrees">28??</div>
                        </div>
                    </div>
                </div>
            </section><!--.widget-weather-->

            <section class="box-typical box-typical-padding widget" style="color: #00a8ff; font-size: 1.75rem; text-align: center;">
                <i class="font-icon font-icon-weather-clouds"></i>
                <i class="font-icon font-icon-weather-cloud"></i>
                <i class="font-icon font-icon-weather-cloud-circles"></i>
                <i class="font-icon font-icon-weather-cloud-drops-lightning"></i>
                <i class="font-icon font-icon-weather-cloud-moon"></i>
                <i class="font-icon font-icon-weather-cloud-one-circle"></i>
                <i class="font-icon font-icon-weather-cloud-one-drop"></i>
                <i class="font-icon font-icon-weather-cloud-rain-snow"></i>
                <i class="font-icon font-icon-weather-cloud-sun"></i>
                <i class="font-icon font-icon-weather-cloud-two-circles"></i>
                <i class="font-icon font-icon-weather-cloud-two-drops"></i>
                <i class="font-icon font-icon-weather-cloud-two-snow"></i>
                <i class="font-icon font-icon-weather-clound-lightning"></i>
                <i class="font-icon font-icon-weather-sun"></i>
                <i class="font-icon font-icon-weather-snowflake"></i>
                <i class="font-icon font-icon-weather-snow"></i>
                <i class="font-icon font-icon-weather-rain"></i>
                <i class="font-icon font-icon-weather-one-snow"></i>
                <i class="font-icon font-icon-weather-moon-small-cloud"></i>
                <i class="font-icon font-icon-weather-moon-cloud-rain"></i>
                <i class="font-icon font-icon-weather-moon-cloud"></i>
                <i class="font-icon font-icon-weather-moon"></i>
                <i class="font-icon font-icon-weather-lightning"></i>
                <i class="font-icon font-icon-weather-house-water"></i>
                <i class="font-icon font-icon-weather-funnel"></i>
                <i class="font-icon font-icon-weather-drop"></i>
                <i class="font-icon font-icon-weather-sun-cloud"></i>
                <i class="font-icon font-icon-weather-sun-clouds"></i>
                <i class="font-icon font-icon-weather-sun-rain"></i>
                <i class="font-icon font-icon-weather-thermometer"></i>
                <i class="font-icon font-icon-weather-umbrella"></i>
                <i class="font-icon font-icon-weather-waves"></i>
            </section>
        </div>
    </div><!--.row-->

    <div class="row">
        <div class="col-xxl-5 col-xl-6 col-md-9">
            <section class="widget widget-chart-extra">
                <div class="widget-chart-extra-blue">
                    <div class="widget-chart-extra-blue-title">Revenue</div>
                    <div id="chart_line" class="chart"></div>
                </div>

                <div class="widget-chart-extra-inner">
                    <div class="widget-chart-extra-section">
                        <div class="widget-chart-extra-title">Inquiries</div>
                        <div class="widget-chart-extra-bars">
                            <div class="widget-chart-extra-bars-chart">
                                <div class="widget-chart-extra-bars-chart-in">
                                    <div class="cstm-chart-bars">
                                        <div class="cstm-chart-bars-in">
                                            <div class="item">
                                                <div class="bar"><div style="height: 50%"></div></div>
                                                <div class="caption">A</div>
                                            </div>
                                            <div class="item">
                                                <div class="bar"><div style="height: 60%"></div></div>
                                                <div class="caption">B</div>
                                            </div>
                                            <div class="item">
                                                <div class="bar"><div style="height: 75%"></div></div>
                                                <div class="caption">C</div>
                                            </div>
                                            <div class="item">
                                                <div class="bar"><div style="height: 42%"></div></div>
                                                <div class="caption">D</div>
                                            </div>
                                            <div class="item">
                                                <div class="bar"><div style="height: 89%"></div></div>
                                                <div class="caption">E</div>
                                            </div>
                                            <div class="item">
                                                <div class="bar"><div style="height: 95%"></div></div>
                                                <div class="caption">F</div>
                                            </div>
                                            <div class="item">
                                                <div class="bar"><div style="height: 32%"></div></div>
                                                <div class="caption">G</div>
                                            </div>
                                            <div class="item">
                                                <div class="bar"><div style="height: 47%"></div></div>
                                                <div class="caption">H</div>
                                            </div>
                                            <div class="item">
                                                <div class="bar"><div style="height: 66%"></div></div>
                                                <div class="caption">I</div>
                                            </div>
                                            <div class="item">
                                                <div class="bar"><div style="height: 81%"></div></div>
                                                <div class="caption">J</div>
                                            </div>
                                            <div class="item">
                                                <div class="bar"><div style="height: 10%"></div></div>
                                                <div class="caption">K</div>
                                            </div>
                                            <div class="item">
                                                <div class="bar"><div style="height: 50%"></div></div>
                                                <div class="caption">L</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-chart-extra-bars-txt">
                                <div class="number">+142</div>
                                <div class="caption">From last year</div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-chart-extra-section">
                        <div class="tbl widget-chart-extra-stat">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <div class="title">Gross Revenue</div>
                                    <div class="number">9,362.74</div>
                                </div>
                                <div class="tbl-cell">
                                    <div class="title">Net Revenue</div>
                                    <div class="number">6,734.89</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--.widget-chart-extra-->

            <section class="widget widget-chart-combo">
                <div class="widget-chart-combo-header">
                    <div class="widget-chart-combo-header-left">
                        <select class="select2 select2-white">
                            <option>All Segments</option>
                            <option>All Segments</option>
                            <option>All Segments</option>
                            <option>All Segments</option>
                        </select>
                    </div>
                    <div class="widget-chart-combo-header-right">
                        <input type="text" class="form-control" value="1 Jan 2015 ??? 1 Jan 2016">
                        <button type="button" class="btn btn-grey">Reset</button>
                    </div>
                </div>
                <div class="widget-chart-combo-content">
                    <div class="widget-chart-combo-content-in">
                        <div class="widget-chart-combo-content-title">Net New Conversions Over Time</div>
                        <div id="chart_div" class="chart"></div>
                        <ul class="chart-legend-list">
                            <li>
                                <div class="dot purple"></div>
                                Culminate
                            </li>
                            <li>
                                <div class="dot blue"></div>
                                Mountly
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-chart-combo-side">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="number">2739</div>
                                Records Deployed
                            </div>
                        </div>
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="number">1049</div>
                                Won Records
                            </div>
                        </div>
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="number">4,8%</div>
                                Conversion Rate
                            </div>
                        </div>
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="number">12,1</div>
                                Average Activity
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--.widget-chart-combo-->

            <section class="widget widget-activity">
                <header class="widget-header">
                    Activity
                    <span class="label label-pill label-primary">2</span>
                </header>
                <div>
                    <div class="widget-activity-item">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo">
                                    <a href="#">
                                        <img src="img/photo-64-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="tbl-cell">
                                    <p>
                                        <a href="#" class="semibold">Nina Jones</a>
                                        added a new product
                                        <a href="#">Free UI Kit</a>
                                    </p>
                                    <p>Just Now</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-activity-item">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo">
                                    <a href="#">
                                        <img src="img/avatar-1-64.png" alt="">
                                    </a>
                                </div>
                                <div class="tbl-cell">
                                    <p>
                                        <a href="#" class="semibold">James Smith</a>
                                        commpleted task
                                        <a href="#">Free PSD Template</a>
                                    </p>
                                    <p>40 minutes ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-activity-item">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo">
                                    <a href="#">
                                        <img src="img/avatar-2-64.png" alt="">
                                    </a>
                                </div>
                                <div class="tbl-cell">
                                    <p>
                                        <a href="#" class="semibold">Alex Clooney</a>
                                        commpleted task
                                        <a href="#">Sumu Website</a>
                                    </p>
                                    <p>1 hours ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-activity-item">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo">
                                    <a href="#">
                                        <img src="img/avatar-3-64.png" alt="">
                                    </a>
                                </div>
                                <div class="tbl-cell">
                                    <p>
                                        <a href="#" class="semibold">Nina Jones</a>
                                        added a new product
                                        <a href="#">Free UI Kit</a>
                                    </p>
                                    <p>Just Now</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--.widget-tasks-->

            <section class="widget widget-tasks">
                <header class="widget-header">
                    Tasks
                    <span class="label label-pill label-primary">8</span>
                    <span class="label label-pill label-danger">29</span>
                </header>
                <div>
                    <div class="widget-tasks-item">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo">
                                    <a href="#">
                                        <img src="img/photo-64-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="tbl-cell">
                                    <p class="user-card-row-name"><a href="#">New websites for Symu.com</a></p>
                                    <p class="color-red">5 day delays</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group widget-menu">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-icon glyphicon glyphicon-option-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-tasks-item">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo">
                                    <a href="#">
                                        <img src="img/avatar-3-64.png" alt="">
                                    </a>
                                </div>
                                <div class="tbl-cell">
                                    <p class="user-card-row-name"><a href="#">New websites for Symu.com</a></p>
                                    <p class="color-red">5 day delays</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group widget-menu">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-icon glyphicon glyphicon-option-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-tasks-item">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo">
                                    <a href="#">
                                        <img src="img/avatar-2-64.png" alt="">
                                    </a>
                                </div>
                                <div class="tbl-cell">
                                    <p class="user-card-row-name"><a href="#">New websites for Symu.com</a></p>
                                    <p class="color-blue-grey-lighter">3 day left</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group widget-menu">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-icon glyphicon glyphicon-option-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-tasks-item">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo">
                                    <a href="#">
                                        <img src="img/avatar-1-64.png" alt="">
                                    </a>
                                </div>
                                <div class="tbl-cell">
                                    <p class="user-card-row-name"><a href="#">New websites for Symu.com</a></p>
                                    <p class="color-blue-grey-lighter">5 day left</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group widget-menu">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-icon glyphicon glyphicon-option-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--.widget-tasks-->
        </div>

        <div class="col-xxl-5 col-xl-6 col-md-9">
            <section class="widget widget-pie-chart">
                <div class="no-padding">
                    <div class="tbl tbl-grid text-center">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-30">
                                <div class="display-inline">
                                    <div class="chart-legend">
                                        <div class="circle red"></div>
                                        <div class="percent">8%<sup>14</sup></div>
                                        <div class="caption">TBK</div>
                                    </div>
                                    <div class="chart-legend">
                                        <div class="circle orange"></div>
                                        <div class="percent">41%<sup>134</sup></div>
                                        <div class="caption">Fluor Group</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell tbl-cell-30">
                                <div class="display-inline">
                                    <div class="chart-legend">
                                        <div class="circle purple"></div>
                                        <div class="percent">12%<sup>22</sup></div>
                                        <div class="caption">Fluor Corp</div>
                                    </div>
                                    <div class="chart-legend">
                                        <div class="circle blue"></div>
                                        <div class="percent">39%<sup>115</sup></div>
                                        <div class="caption">Bechtel</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell tbl-cell-40">
                                <div class="ggl-pie-chart-container">
                                    <div id="donutchart" class="ggl-pie-chart"></div>
                                    <div class="ggl-pie-chart-title">
                                        <div class="caption">Total</div>
                                        <div class="number">285</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--.widget-pie-chart-->

            <section class="widget widget-pie-chart">
                <div class="no-padding">
                    <div class="tbl tbl-grid">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="ggl-pie-chart-container">
                                    <div id="donutchart2" class="ggl-pie-chart"></div>
                                    <div class="ggl-pie-chart-title">
                                        <div class="caption">Files</div>
                                        <div class="number">218</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell tbl-cell-340px">
                                <div class="col">
                                    <div class="chart-box-info">
                                        <div class="number">218</div>
                                        <div class="caption">Files</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="chart-box-info">
                                        <div class="number">715</div>
                                        <div class="caption">Gigabytes</div>
                                    </div>
                                </div>
                                <div class="chart-legend-tbl">
                                    <div class="title">Legend:</div>
                                    <div class="tbl">
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-legend">
                                                <div class="dot orange"></div>
                                                Culminate <span class="color-blue-grey-lighter">(74 files)</span>
                                            </div>
                                            <div class="tbl-cell tbl-cell-value">283GB</div>
                                        </div>
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-legend">
                                                <div class="dot green"></div>
                                                Mountly <span class="color-blue-grey-lighter">(74 files)</span>
                                            </div>
                                            <div class="tbl-cell tbl-cell-value">23GB</div>
                                        </div>
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-legend">
                                                <div class="dot red"></div>
                                                Other <span class="color-blue-grey-lighter">(74 files)</span>
                                            </div>
                                            <div class="tbl-cell tbl-cell-value">173GB</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--.widget-pie-chart-->

            <section class="widget widget-pie-chart">
                <div class="widget-pie-chart-header">
                    <div class="col-60">
                        <div class="widget-pie-chart-header-title">Your Sales</div>
                    </div>
                    <div class="col-40">
                        <div class="period">
                            <div class="lbl">Period</div>
                            <select class="select2 select2-white">
                                <option>Last year</option>
                                <option>Last year</option>
                                <option>Last year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tbl tbl-grid">
                    <div class="tbl-row">
                        <div class="tbl-cell tbl-cell-60">
                            <div class="ggl-pie-chart-container size-180">
                                <div id="donutchart3" class="ggl-pie-chart"></div>
                                <div class="ggl-pie-chart-title">
                                    <div class="caption">Total</div>
                                    <div class="number">1560</div>
                                </div>
                            </div>
                        </div>
                        <div class="tbl-cell tbl-cell-40">
                            <ul class="chart-legend-list font-16">
                                <li>
                                    <div class="dot blue"></div>
                                    Websites
                                </li>
                                <li>
                                    <div class="dot purple"></div>
                                    Logo
                                </li>
                                <li>
                                    <div class="dot red"></div>
                                    Social media
                                </li>
                                <li>
                                    <div class="dot orange"></div>
                                    Adwords
                                </li>
                                <li>
                                    <div class="dot green"></div>
                                    E-Commerce
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section><!--.widget-pie-chart-->

            <section class="widget widget-user">
                <div class="widget-user-bg" style="background-image: url('img/widget-user-bg.jpg')"></div>
                <div class="widget-user-photo">
                    <img src="img/avatar-2-256.png" alt="">
                </div>
                <div class="widget-user-name">
                    Carol Green
                    <i class="font-icon font-icon-award"></i>
                </div>
                <div>Company Founder</div>
                <div class="widget-user-stat">
                    <div class="item">
                        <div class="number">75</div>
                        <div class="caption">Materials</div>
                    </div>
                    <div class="item">
                        <div class="number">42</div>
                        <div class="caption">Discussions</div>
                    </div>
                    <div class="item">
                        <div class="number">1.2K</div>
                        <div class="caption">Followers</div>
                    </div>
                </div>
            </section><!--.widget-user-->

            <div class="row">
                <div class="col-xl-6">
                    <section class="widget widget-simple-sm">
                        <div class="widget-simple-sm-statistic">
                            <div class="number">1 426</div>
                            <div class="caption color-blue">New orders</div>
                        </div>
                        <div class="widget-simple-sm-bottom statistic"><span class="arrow color-green">???</span> 3% increase <strong>1w ago</strong></div>
                    </section><!--.widget-simple-sm-->
                </div>
                <div class="col-xl-6">
                    <section class="widget widget-simple-sm">
                        <div class="widget-simple-sm-statistic">
                            <div class="number">63 541</div>
                            <div class="caption color-purple">Total sales gross</div>
                        </div>
                        <div class="widget-simple-sm-bottom statistic"><span class="arrow color-green">???</span> 3% increase <strong>1w ago</strong></div>
                    </section><!--.widget-simple-sm-->
                </div>
            </div><!--.row-->

            <div class="row">
                <div class="col-xl-6">
                    <section class="widget widget-simple-sm">
                        <div class="widget-simple-sm-statistic">
                            <div class="number">852</div>
                            <div class="caption color-red">New orders</div>
                        </div>
                        <div class="widget-simple-sm-bottom statistic"><span class="arrow color-green">???</span> 3% increase <strong>1w ago</strong></div>
                    </section><!--.widget-simple-sm-->
                </div>
                <div class="col-xl-6">
                    <section class="widget widget-simple-sm">
                        <div class="widget-simple-sm-statistic">
                            <div class="number">87</div>
                            <div class="caption color-green">Total sales gross</div>
                        </div>
                        <div class="widget-simple-sm-bottom statistic"><span class="arrow color-red">???</span> 6% decrease <strong>1w ago</strong></div>
                    </section><!--.widget-simple-sm-->
                </div>
            </div><!--.row-->

            <section class="widget widget-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                <article class="panel">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <a data-toggle="collapse"
                           data-parent="#accordion"
                           href="#collapseOne"
                           aria-expanded="true"
                           aria-controls="collapseOne">
                            Collapsible Group Item #1
                            <i class="font-icon font-icon-arrow-down"></i>
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-collapse-in">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="img/photo-64-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Maurico Estrella</a></p>
                                        <p class="user-card-row-location">Associate Creative Director @EF</p>
                                    </div>
                                </div>
                            </div>
                            <header class="title">How a password changed my life</header>
                            <p>??How could she do something like this to me??? said a voice in my head. All the time. Every day... <a href="#">More</a></p>
                        </div>
                    </div>
                </article>
                <article class="panel">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <a class="collapsed"
                           data-toggle="collapse"
                           data-parent="#accordion"
                           href="#collapseTwo"
                           aria-expanded="false"
                           aria-controls="collapseTwo">
                            Collapsible Group Item #2
                            <i class="font-icon font-icon-arrow-down"></i>
                        </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-collapse-in">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="img/avatar-3-64.png" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Michelle Lewis</a></p>
                                        <p class="user-card-row-location">Company Founder</p>
                                    </div>
                                </div>
                            </div>
                            <header class="title">How a password changed my life</header>
                            <p>??How could she do something like this to me??? said a voice in my head. All the time. Every day... <a href="#">More</a></p>
                        </div>
                    </div>
                </article>
                <article class="panel">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <a class="collapsed"
                           data-toggle="collapse"
                           data-parent="#accordion"
                           href="#collapseThree"
                           aria-expanded="false"
                           aria-controls="collapseThree">
                            Collapsible Group Item #3
                            <i class="font-icon font-icon-arrow-down"></i>
                        </a>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-collapse-in">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="img/avatar-2-64.png" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Maurico Estrella</a></p>
                                        <p class="user-card-row-location">Associate Creative Director @EF</p>
                                    </div>
                                </div>
                            </div>
                            <header class="title">How a password changed my life</header>
                            <p>??How could she do something like this to me??? said a voice in my head. All the time. Every day... <a href="#">More</a></p>
                        </div>
                    </div>
                </article>
            </section><!--.widget-accordion-->
        </div>
    </div><!--.row-->
</div><!--.container-fluid-->
@endsection


@section('scripts')
    
@endsection