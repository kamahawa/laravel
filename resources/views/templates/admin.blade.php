<html>
<head>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ URL::asset('public/images/favicon.png') }}">
    <title>@yield('title')</title>
    <link href="{{ URL::asset('public/css/themeshop/bootstrap.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('public/css/themeshop/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/css/themeshop/flexslider.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{ URL::asset('public/css/themeshop/sequence-looptheme.css') }}" rel="stylesheet" media="all"/>
    <link href="{{ URL::asset('public/css/themeshop/style.css') }}" rel="stylesheet">

</head>
<body id="home">
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div class="logo"><a href="index.html"><img src="{{ URL::asset('public/images/logo.png') }}" alt="FlatShop"></a></div>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="header_bottom">
                    <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active dropdown">
                                <a href="#">Trang ch?</a>

                            </li>
                            <li><a href="productgird.html">Làm ??p t? nhiên</a></li>
                            <li class="dropdown">
                                <a href="productlitst.html" class="dropdown-toggle" data-toggle="dropdown">M? ph?m</a>
                                <div class="dropdown-menu mega-menu">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <ul class="mega-menu-links">
                                                <li><a href="productgird.html">New Collection</a></li>
                                                <li><a href="productgird.html">Shirts & tops</a></li>
                                                <li><a href="productgird.html">Laptop & Brie</a></li>
                                                <li><a href="productgird.html">Dresses</a></li>
                                                <li><a href="productgird.html">Blazers & Jackets</a></li>
                                                <li><a href="productgird.html">Shoulder Bags</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <ul class="mega-menu-links">
                                                <li><a href="productgird.html">New Collection</a></li>
                                                <li><a href="productgird.html">Shirts & tops</a></li>
                                                <li><a href="productgird.html">Laptop & Brie</a></li>
                                                <li><a href="productgird.html">Dresses</a></li>
                                                <li><a href="productgird.html">Blazers & Jackets</a></li>
                                                <li><a href="productgird.html">Shoulder Bags</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a href="productlitst.html" class="dropdown-toggle" data-toggle="dropdown">T?p hóa</a>
                                <div class="dropdown-menu mega-menu">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <ul class="mega-menu-links">
                                                <li><a href="productgird.html">New Collection</a></li>
                                                <li><a href="productgird.html">Shirts & tops</a></li>
                                                <li><a href="productgird.html">Laptop & Brie</a></li>
                                                <li><a href="productgird.html">Dresses</a></li>
                                                <li><a href="productgird.html">Blazers & Jackets</a></li>
                                                <li><a href="productgird.html">Shoulder Bags</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="contact.html">Liên h?</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

@yield('content')

<div class="clearfix"></div>

<!-- Bootstrap core JavaScript==================================================-->
<script type="text/javascript" src="{{ URL::asset('public/js/themeshop/jquery-1.10.2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/themeshop/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/themeshop/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/themeshop/jquery.sequence-min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/themeshop/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
<script defer src="{{ URL::asset('public/js/themeshop/jquery.flexslider.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/themeshop/script.min.js') }}" ></script>
</body>
</html>