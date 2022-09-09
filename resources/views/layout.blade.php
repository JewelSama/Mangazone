<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mangazone</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Website for purchasing Japanese Manga" />
	<meta name="keywords" content="Website for purchasing Japanese Manga" />
	<meta name="author" content="" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
    <link rel="shortcut icon" href="images/manLogo.png" type="image/x-icon">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<style>
		 .active{
  background-color: #666;
  color: white;
} 
	</style>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="/">Mangazone.</a></div>
					
				</div>
				<div class="col-md-6 col-xs-6 text-center menu-1">
					<ul class="navbar-nav">
						
						<li><a href="/" class="nav-link">{{_('Home')}}</a></li>
						<li class="nav-item"><a href="/about" class="">{{_('About')}}</a></li>
						<li class="has-dropdown">
							<a href="#">{{_('Category')}}<i class="icon-triangle-down"></i></a>
							<ul class="dropdown">
								<li><a href="#">{{_('Action')}}</a></li>
								<li><a href="#">{{_('Slice of Life')}}</a></li>
								<li><a href="#">{{_('Ecchi')}}</a></li>
								<li><a href="#">{{_('Supernatural')}}</a></li>
							</ul> 
						</li>
						<li><a href="/contact" class="nav-link">{{_('Contact')}}</a></li>
					</ul>
					<!--  -->
					<ul>
					<li class="has-dropdown">
							<a href="#"> Ohayo <b> @auth
								{{auth()->user()->username}}
							@endauth 
							@guest 
							Minna san 
							@endguest</b><i class="icon-triangle-down"></i>🍡</a>
							<ul class="dropdown">
								@guest()
									<li><a href="" data-toggle="modal" class="nav-link" data-target="#myModal">{{_('Login')}}</a></li>
								@endguest
								<li><a href="#">{{_('Admin')}}</a></li>
								@auth()
								<form action="{{route('logout')}}" method="post" class="inline p-3">
									@csrf
									<li><button type="submit" class="btn-jewel" class="nav-link" >{{_('Logout')}}</button></li>
									</form>
								@endauth
								
							</ul> 
						</li>
						</ul>




				</div>
				<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
					<ul>
						<li class="search">
							<div class="input-group">
						      <input type="text" placeholder="Search..">
						      <span class="input-group-btn">
						        <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
						      </span>
						    </div>
						</li>
						<li class="shopping-cart"><a href="{{route('cart')}}" class="cart"><span><small>0</small><i class="icon-shopping-cart"></i></span></a></li>
					</ul>
				</div>
			</div>
			
		</div>
		@if(session('status'))
		<div class="session-alt fixed-top  mx-auto text-center text-white" style="margin: auto;padding: 3px">
            {{session('status')}}
        </div>
		@endif
	</nav>

<!-- The modal -->
<!-- The modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"><b>Log In To Your Account🎌</b></h4>
      </div>
      <div class="modal-body">
	  <form class="form-horizontal" method="POST" action="{{route('login')}}" role="form">
		@csrf
				<div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" autofocus>
                       
                    </div>
                </div>
				
               
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                    </div>
                </div>
			Don't have an account? <a href="/register">Register</a>
      </div>
      <div class="modal-footer">
	  <button type="submit" class="btn btn-info">Login</button>
	</form> <!-- /form -->
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>

    </div>

  </div>
</div>
    @yield('content')

    <footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>Mangazone.</h3>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">About</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Shop</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; <script>document.write(new Date().getFullYear())</script> Jewel~Sama. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://github.com/jewelSama" target="_blank">Jewel~Sama</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-github"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	
	

	</body>
</html>
