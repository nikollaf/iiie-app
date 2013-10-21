<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			IIIE - Home Page, Islam Chicago
			@show
		</title>
		<meta name="keywords" content="your, awesome, keywords, here" />
		<meta name="author" content="Franc Nikolla" />
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->


		<link href="/projects/laravel/public/assets/css/bootstrap.css" rel="stylesheet">
		<link href="/projects/laravel/public/assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="/projects/laravel/public/assets/css/datepicker.css" rel="stylesheet">

        <link href="/projects/laravel/public/assets/css/custom.css" rel="stylesheet">

        <!-- ckeditor -->



		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
	</head>

	<body>

		<!-- ./ navbar -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">


                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                    <!--
                    <li class="navbar-text">Logged in as {{{ Auth::user()->fullName() }}}</li>
                    -->
                    <li class="divider-vertical"></li>
                        <li {{{ (Request::is('blogs') ? 'class="active"' : '') }}}>
                             <a class="btn-blog btn btn-nav" href="{{{ URL::to('blogs/add') }}}">
                                  Add Blog</a>
                        </li>
                         <li {{{ (Request::is('events') ? 'class="active"' : '') }}}>
                            <a class="btn btn-event btn-nav" href="{{{ URL::to('events/add') }}}">
                                 Add Event
                            </a>
                        </li>
                         <li {{{ (Request::is('events') ? 'class="active"' : '') }}}>
                            <a class="btn btn-article btn-nav" href="{{{ URL::to('articles/add') }}}">
                                Add Article</a>
                         </li>
                        <li {{{ (Request::is('resources') ? 'class="active"' : '') }}}>
                        <a class="btn btn-resource btn-nav" href="{{{ URL::to('resources/add') }}}">
                            Add Resource</a>
                        </li>
                        <li {{{ (Request::is('account') ? 'class="active"' : '') }}}>
                            <button class="btn btn-nav dropdown-toggle" data-toggle="dropdown">
                                Account <span class="caret"></span>
                            </button>
                         <ul class="dropdown-menu" role="menu">
                            <li><a href="{{{ URL::to('account') }}}">Edit Account</a></li>
                            <li><a href="{{{ URL::to('account/logout') }}}">Logout</a></li>
                         </ul>
                    @else

                    <li {{{ (Request::is('account/login') ? 'class="active"' : '') }}}><a class="btn btn-nav"  href="{{{ URL::to('account/login') }}}">Login</a></li>
                    <li {{{ (Request::is('account/register') ? 'class="active"' : '') }}}><a class="btn btn-nav"  href="{{{ URL::to('account/register') }}}">Register</a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
            </div>
        </nav>

        <!-- Top Header Title -->
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h1>IIIE.</h1>
                    </div>

                    <!-- Social Links -->
                    <div class="col-md-4 col-md-offset-4">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="facebook icon"></i></a></li>
                            <li><a href="#"><i class="youtube icon"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->


        <div id="content">
            <div class="container">
                <div class="row">
                    <ul class="nav nav-pills content-nav">
                        <li {{ (Request::is('server.php') ? 'class="active"' : '') }}><a href="http://localhost/projects/laravel/server.php">Home</a></li>
                        <li {{ (Request::is('events') ? 'class="active"' : '') }}><a href="{{{ URL::to('events') }}}">Events</a></li>
                        <li {{ (Request::is('blogs') ? 'class="active"' : '') }}><a href="{{{ URL::to('blogs') }}}">Blog</a></li>
                        <li {{ (Request::is('articles') ? 'class="active"' : '') }}><a href="{{{ URL::to('articles') }}}">Articles</a></li>
                        <li {{ (Request::is('resources') ? 'class="active"' : '') }}><a href="{{{ URL::to('resources') }}}">Resources</a></li>
                        <li {{ (Request::is('videos') ? 'class="active"' : '') }}><a href="#">Videos</a></li>
                        <li {{ (Request::is('videos') ? 'class="active"' : '') }}><a href="#">Contact</a></li>
                    </ul>
                </div>

                <!-- Content -->
                @yield('content')
                <!-- ./ content -->

            <!-- ./ container -->
            </div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>About IIIE</h5>
                        <p>The Institute of Islamic Information and Education (III&E) is dedicated to the cause of Islam in North America by providing accurate information about Islamic beliefs, history and civilization from authentic sources. The III&E was established in Chicago, Illinois in 1985 with the comprehensive project of conveying the message of Islam to everyone in North America.</p>
                    </div>
                    <div class="col-md-2 col-md-offset2">
                        <h5>Social Links</h5>
                        <ul class="footer-links">
                            <li><a href="http://www.iiie.net">IIIE.net</a></li>
                            <li><a href="http://www.iiie.net">Facebook Page</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-md-offset-2">
                        <h5>Other Organizations</h5>
                        <ul class="footer-links">
                            <li><a href="http://www.iiie.net">Ta'leef</a></li>
                            <li><a href="http://www.iiie.net">CCC</a></li>
                        </ul>
                    </div>

                </div>
                <div class="copyright-footer">
                    <h5> &copy; {{ date('Y') }} The Institute of Islamic Information and Education (III&E)</h5>
                </div>
            </div>
        </div>

		<!-- Javascripts
		================================================== -->

        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="/projects/laravel/vendor/ckeditor/ckeditor.js"></script>
        <script src="/projects/laravel/vendor/ckeditor/adapters/jquery.js"></script>
        <script src="/projects/laravel/public/assets/js/custom.js"></script>
        <script src="/projects/laravel/public/assets/js/bootstrap-datepicker.js"></script>
        <script src="/projects/laravel/public/assets/js/bootstrap.min.js"></script>

	</body>
</html>
