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
             <!--
                <ul class="option">
                   <li id="search" class="search">
                      <form><input class="search-submit" type="submit" value=""><input class="search-input" placeholder="Enter your search term..." type="text" value="" name="search"></form>
                   </li>
                   <li class="option-cart">
                      <a href="#" class="cart-icon">cart <span class="cart_no">02</span></a>
                      <ul class="option-cart-item">
                         <li>
                            <div class="cart-item">
                               <div class="image"><img src="images/products/thum/products-01.png" alt=""></div>
                               <div class="item-description">
                                  <p class="name">Lincoln chair</p>
                                  <p>Size: <span class="light-red">One size</span><br>Quantity: <span class="light-red">01</span></p>
                               </div>
                               <div class="right">
                                  <p class="price">$30.00</p>
                                  <a href="#" class="remove"><img src="images/remove.png" alt="remove"></a>
                               </div>
                            </div>
                         </li>
                         <li>
                            <div class="cart-item">
                               <div class="image"><img src="images/products/thum/products-02.png" alt=""></div>
                               <div class="item-description">
                                  <p class="name">Lincoln chair</p>
                                  <p>Size: <span class="light-red">One size</span><br>Quantity: <span class="light-red">01</span></p>
                               </div>
                               <div class="right">
                                  <p class="price">$30.00</p>
                                  <a href="#" class="remove"><img src="images/remove.png" alt="remove"></a>
                               </div>
                            </div>
                         </li>
                         <li><span class="total">Total <strong>$60.00</strong></span><button class="checkout" onClick="location.href='checkout.html'">CheckOut</button></li>
                      </ul>
                   </li>
                </ul>
                -->
                <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div class="navbar-collapse collapse">
                   <ul class="nav navbar-nav">
                      <li class="active dropdown">
                         <a href="#">Trang chủ</a>
                         <!--
                         <div class="dropdown-menu">
                            <ul class="mega-menu-links">
                               <li><a href="index.html">home</a></li>
                               <li><a href="home2.html">home2</a></li>
                               <li><a href="home3.html">home3</a></li>
                               <li><a href="productlitst.html">Productlitst</a></li>
                               <li><a href="productgird.html">Productgird</a></li>
                               <li><a href="details.html">Details</a></li>
                               <li><a href="cart.html">Cart</a></li>
                               <li><a href="checkout.html">CheckOut</a></li>
                               <li><a href="checkout2.html">CheckOut2</a></li>
                               <li><a href="contact.html">contact</a></li>
                            </ul>
                         </div>
                         -->
                      </li>
                      <li><a href="productgird.html">Làm đẹp tự nhiên</a></li>
                      <li class="dropdown">
                         <a href="productlitst.html" class="dropdown-toggle" data-toggle="dropdown">Mỹ phẩm</a>
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
                         <a href="productlitst.html" class="dropdown-toggle" data-toggle="dropdown">Tạp hóa</a>
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
                      <li><a href="contact.html">Liên hệ</a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="hom-slider">
    <div class="container">
      <div id="sequence">
         <div class="sequence-prev"><i class="fa fa-angle-left"></i></div>
         <div class="sequence-next"><i class="fa fa-angle-right"></i></div>
         <ul class="sequence-canvas">
            <li class="animate-in">
               <div class="flat-caption caption1 formLeft delay300 text-center"><span class="suphead">Paris show 2014</span></div>
               <div class="flat-caption caption2 formLeft delay400 text-center">
                  <h1>Collection For Winter</h1>
               </div>
               <div class="flat-caption caption3 formLeft delay500 text-center">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
               </div>
               <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="#">More Details</a></div>
               <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true"><img src="{{ URL::asset('public/images/slider-image-01.png') }}" alt=""></div>
            </li>
            <li>
               <div class="flat-caption caption2 formLeft delay400">
                  <h1>Collection For Winter</h1>
               </div>
               <div class="flat-caption caption3 formLeft delay500">
                  <h2>Etiam velit purus, luctus vitae velit sedauctor<br>egestas diam, Etiam velit purus.</h2>
               </div>
               <div class="flat-button caption5 formLeft delay600"><a class="more" href="#">More Details</a></div>
               <div class="flat-image formBottom delay200" data-bottom="true"><img src="{{ URL::asset('public/images/slider-image-02.png') }}" alt=""></div>
            </li>
            <li>
               <div class="flat-caption caption2 formLeft delay400 text-center">
                  <h1>New Fashion of 2013</h1>
               </div>
               <div class="flat-caption caption3 formLeft delay500 text-center">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
               </div>
               <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="#">More Details</a></div>
               <div class="flat-image formBottom delay200" data-bottom="true"><img src="{{ URL::asset('public/images/slider-image-03.png') }}" alt=""></div>
            </li>
         </ul>
      </div>
   </div>
   <!--
   <div class="promotion-banner">
      <div class="container">
         <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
               <div class="promo-box"><img src="{{ URL::asset('public/images/promotion-01.png') }}" alt=""></div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
               <div class="promo-box"><img src="{{ URL::asset('public/images/promotion-02.png') }}" alt=""></div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
               <div class="promo-box"><img src="{{ URL::asset('public/images/promotion-03.png') }}" alt=""></div>
            </div>
         </div>
      </div>
   </div>
   -->
</div>

<div class="clearfix"></div>
	@yield('content')

<div class="clearfix"></div>

<div class="footer">
    <div class="footer-info">
       <div class="container">
          <div class="row">
             <div class="col-md-3">
                <div class="footer-logo"><a href="#"><img src="{{ URL::asset('public/images/logo.png') }}" alt=""></a></div>
             </div>
             <div class="col-md-3 col-sm-6">
                <h4 class="title">Liên<strong> hệ</strong></h4>
                <p> Phạm Thế Hiển, phường 7, Hồ Chí Minh , Việt Nam</p>
                <p>Call Us : 0968 68 68 68</p>
                <p>Email : khanhcashop@gmail.com</p>
             </div>
             <div class="col-md-3 col-sm-6">
                <h4 class="title">Customer<strong> Support</strong></h4>
                <ul class="support">
                   <li><a href="#">FAQ</a></li>
                   <li><a href="#">Payment Option</a></li>
                   <li><a href="#">Booking Tips</a></li>
                   <li><a href="#">Infomation</a></li>
                </ul>
             </div>
             <div class="col-md-3">
                <h4 class="title">Get Our <strong>Newsletter </strong></h4>
                <p>Lorem ipsum dolor ipsum dolor.</p>
                <form class="newsletter">
                    <input type="text" name="" placeholder="Type your email....">
                    <input type="submit" value="SignUp" class="button">
                </form>
             </div>
          </div>
       </div>
    </div>
    <div class="copyright-info">
       <div class="container">
          <div class="row">
             <div class="col-md-6">
                <p>Copyright © 2016. Designed by <a href="#">Kama Hawa</a>. All rights reseved</p>
             </div>
             <div class="col-md-6">
                <ul class="social-icon">
                   <li><a href="#" class="linkedin"></a></li>
                   <li><a href="#" class="google-plus"></a></li>
                   <li><a href="#" class="twitter"></a></li>
                   <li><a href="#" class="facebook"></a></li>
                </ul>
             </div>
          </div>
       </div>
    </div>
 </div>

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