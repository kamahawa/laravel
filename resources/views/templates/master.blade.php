<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Homepage</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

	<link rel="stylesheet" href="{{ URL::asset('public/css/style.css') }}">
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery-2.1.4.min.js') }}"></script>
    <link href="{{ URL::asset('public/css/theme/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ URL::asset('public/css/theme/form.css') }}" rel="stylesheet" type="text/css" media="all" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="{{ URL::asset('public/js/theme/jquery.easydropdown.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });

            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });

            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
    </script>

    <!-- start menu -->
    <link href="{{ URL::asset('public/css/theme/megamenu.css') }}" rel="stylesheet" type="text/css" media="all" />

    <script type="text/javascript" src="{{ URL::asset('public/js/theme/megamenu.js') }}"></script>

    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <!-- end menu -->
    <script type="text/javascript" src="{{ URL::asset('public/js/theme/jquery.jscrollpane.min.js') }}"></script>

    <script type="text/javascript" id="sourcecode">
        $(function()
        {
            $('.scroll-pane').jScrollPane();
        });
    </script>
    <!-- top scrolling -->
    <script type="text/javascript" src="{{ URL::asset('public/js/theme/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/theme/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>

    @yield('jsAndCss')
</head>
<body>
<header>
    <div class="header-top">
        <div class="wrap">
            <div class="logo">
                <a href="#"><img src="{{ URL::asset('public/images/web/logo.png') }}" alt=""/></a>
            </div>
            <div class="cssmenu">
                <!--
                <ul>
                    <li class="active"><a href="#">Register</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
                -->
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="wrap">
            <!-- start header menu -->
            <ul class="megamenu skyblue">
                <li><a class="color1" href="#">Home</a></li>
                <li class="grid"><a class="color2" href="#">Mỹ phẩm</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Nước hoa</h4>
                                    <ul>
                                        <li><a href="shop.html">Ck</a></li>
                                        <li><a href="shop.html">Channel</a></li>
                                        <li><a href="shop.html">adidas</a></li>
                                    </ul>
                                </div>
                                <!--
                                <div class="h_nav">
                                    <h4 class="top">men</h4>
                                    <ul>
                                        <li><a href="shop.html">new arrivals</a></li>
                                        <li><a href="shop.html">men</a></li>
                                        <li><a href="shop.html">women</a></li>
                                        <li><a href="shop.html">accessories</a></li>
                                        <li><a href="shop.html">kids</a></li>
                                        <li><a href="shop.html">style videos</a></li>
                                    </ul>
                                </div>
                                -->
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Son môi</h4>
                                    <ul>
                                        <li><a href="shop.html">SON MÔI ARITAUM</a></li>
                                        <li><a href="shop.html">son nước BOURIOIS ROUGE EDITION VELVET</a></li>
                                        <li><a href="shop.html">Son LANEIGE two tone lip bar</a></li>
                                        <li><a href="shop.html">kids</a></li>
                                        <li><a href="shop.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Macara</h4>
                                    <ul>
                                        <li><a href="shop.html">mabeline</a></li>
                                        <li><a href="shop.html"></a></li>
                                        <li><a href="shop.html"></a></li>
                                        <li><a href="shop.html"></a></li>
                                        <li><a href="shop.html"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <img src="web/images/nav_img.jpg" alt=""/>
                        </div>
                    </div>
                </li>
                <li class="active grid"><a class="color4" href="#">Làm đẹp tự nhiên</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>shop</h4>
                                    <ul>
                                        <li><a href="shop.html">new arrivals</a></li>
                                        <li><a href="shop.html">men</a></li>
                                        <li><a href="shop.html">women</a></li>
                                        <li><a href="shop.html">accessories</a></li>
                                        <li><a href="shop.html">kids</a></li>
                                        <li><a href="shop.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>help</h4>
                                    <ul>
                                        <li><a href="shop.html">trends</a></li>
                                        <li><a href="shop.html">sale</a></li>
                                        <li><a href="shop.html">style videos</a></li>
                                        <li><a href="shop.html">accessories</a></li>
                                        <li><a href="shop.html">kids</a></li>
                                        <li><a href="shop.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>my company</h4>
                                    <ul>
                                        <li><a href="shop.html">trends</a></li>
                                        <li><a href="shop.html">sale</a></li>
                                        <li><a href="shop.html">style videos</a></li>
                                        <li><a href="shop.html">accessories</a></li>
                                        <li><a href="shop.html">kids</a></li>
                                        <li><a href="shop.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>account</h4>
                                    <ul>
                                        <li><a href="shop.html">login</a></li>
                                        <li><a href="shop.html">create an account</a></li>
                                        <li><a href="shop.html">create wishlist</a></li>
                                        <li><a href="shop.html">my shopping bag</a></li>
                                        <li><a href="shop.html">brands</a></li>
                                        <li><a href="shop.html">create wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>popular</h4>
                                    <ul>
                                        <li><a href="shop.html">new arrivals</a></li>
                                        <li><a href="shop.html">men</a></li>
                                        <li><a href="shop.html">women</a></li>
                                        <li><a href="shop.html">accessories</a></li>
                                        <li><a href="shop.html">kids</a></li>
                                        <li><a href="shop.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <img src="web/images/nav_img1.jpg" alt=""/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>
                <li><a class="color10" href="#">About Us</a></li>
                <li><a class="color12" href="#">Liên hệ</a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</header>
	@yield('content')
<div class="footer">
    <div class="footer-top">
        <div class="wrap">
            <div class="col_1_of_footer-top span_1_of_footer-top">
                <ul class="f_list">
                    <li><span class="delivery">Địa chỉ :<span class="orange"> Phạm Thế Hiển, phường 7, quận 8</span></span></li>
                </ul>
            </div>
            <div class="col_1_of_footer-top span_1_of_footer-top">
                <ul class="f_list">
                    <li><span class="delivery">Liên hệ :<span class="orange"> 0909 68 68 68</span></span></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="copy">
        <div class="wrap">
            <p>© Bản quyền thuộc về Kama Hawa</p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };


        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>