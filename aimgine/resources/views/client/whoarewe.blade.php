<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>Aimgine - Homepage</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS -->
<link href="{{URL::to('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::to('css/style.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::to('css/dropkick.css')}}" rel="stylesheet" type="text/css">

<!-- Google web fonts -->
<link href='http://fonts.googleapis.com/css?family=Exo:300,400,500,600,700, 800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

<!-- JS -->

<script type="{{URL::to('text/javascript')}}" src="js/modernizr.min.js"></script>
<script>
Modernizr.load({
	  test: Modernizr.touch,
	  nope: ['js/jquery.stellar.min.js']
});
</script>
<script type="text/javascript" src="{{URL::to('js/jquery-1.9.1.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('js/jquery.easing.1.3.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('js/jquery.slides.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('js/jquery.dropkick-1.0.3.js')}}"></script>
<script type="text/javascript" src="{{URL::to('js/site.js')}}"></script>
<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
<![endif]-->

</head>

<body>

<div id="top" class="fix-top-header"></div>
<a href="#top" class="btn-go-to-top scroll-btn"></a><!--go to top arrow-->

<!-- Site HEADER -->
<header class="site-header">

		<div class="h-navbar hide">
		<div class="container">

            @include('client.includes.nav')

				<div class="social-buttons">
					<a href="#" class="fb">Facebook</a>
					<a href="#" class="tw">Twitter</a>
					<a href="#" class="in">Linked In</a>
				</div><!-- socials -->

		</div><!-- container -->
		</div><!-- navigation -->

		<div class="h-mainbar">
		<div class="container">

				<a href="#" class="btn-menu toggle-it">
					<span class="line-build">
						<span class="l1"></span>
						<span class="l2"></span>
						<span class="l3"></span>
					</span>
				</a>
				<a href="#" class="logo">
					<img src="images/aimgine-logo.png" class="hidden-phone" alt="Aimgine logo">
					<img src="images/aimgine-logo-mobile.png" class="visible-phone" alt="Aimgine logo">
				</a>
				<a href="#top" class="logo-gototop scroll-btn">
					<img src="images/aimgine-logo-mobile.png" alt="Aimgine logo">
				</a>
				<a href="#GetQuote" class="but get-quote" role="button" data-toggle="modal">Get a quote</a>

		</div><!-- container -->
		</div><!-- main bar -->

<span class="cuted-span white"></span>
</header>

<section>


		<header class="green-bar head-bar">
		<div class="container">

				<h3><span>WHO WE ARE /</span> TEAM</h3>

				<nav class="inp-nav">
					<a href="{{URL::to('who-we-are/team')}}" class="current">Team</a>
					<a href="{{URL::to('who-we-are/testimonials')}}">Testimonials</a>
					<a href="{{URL::to('who-we-are/ourapproach')}}">Our Approach</a>
				</nav>

				<div class="page-descr text-center">
					<p>We offer a customer focused, goal oriented, and step-by-step process explaining approach targeted at professionals and clients alike.</p>
				</div><!-- page description -->

				<a href="#" class="p-prev hidden hidden-phone">prev</a>
				<a href="#" class="p-next hidden-phone">next</a>

		<span class="cuted-span green"></span>
		</div><!-- container -->
		</header><!-- header green bar -->



		<section class="main-section gray-bar">

				<div class="team-row">
					<div class="container">
					<div class="row">
                            @foreach($team as $user)
							<div id="team1" class="span4 team-box text-center">
								<img src="{{URL::to('content/img/team/'.$user->image)}}" alt=" ">
								<h3>{{$user->name}} <small></small></h3>
								<p>{{$user->description}}</p>
								<div class="soc-links">
									<a href="#">email</a>
									<a href="#">linked in</a>
									<a href="#">twitter</a>
								</div>
							</div><!-- column span4 -->
                            @endforeach


					</div><!-- container row -->
					</div><!-- contaienr -->
				</div><!-- team row -->




		</section>



		<section class="client-quotes">
		<div class="container">

				<header class="in_header text-center">
					<h3>Our Services</h3>
				</header><!-- in_header -->

				<div class="sliding-quotes">

                    @foreach($testimonials as $testimonial)
                    <!-- row -->
                    <div>
                    <div class="span8 center-column text-center">
                            <p>{{$testimonial->description}}</p>
                            <div class="person-info">
                            <div class="row-fluid">
                                <div class="span4">	<h5 class="lab-name">{{$testimonial->person_name}}</h5>	</div>
                                <div class="span4">	<div class="i_hold"><img src="{{URL::to('content/img/testimonials/'.$testimonial->image)}}" alt=" "></div>	</div>
                                <div class="span4">	<span class="lab-prof">{{$testimonial->position}}, {{$testimonial->client_name}}</span>	</div>
                            </div><!-- row -->
                            </div>
                    </div><!-- span8 -->
                    </div>

                    <!-- row -->
                    @endforeach
				</div><!-- sliding quotes -->


		<span class="cuted-span white"></span>
		</div><!-- container -->
		</section><!-- TESTOMONIALS -->






</section>



<footer class="site-footer">
<div class="container">
		<div class="row">

				<div class="span3 men-box text-center">
					<h4>AIMGINE</h4>
					<ul>
						<li><a href="#">What we do</a></li>
						<li><a href="#">Work</a></li>
						<li><a href="#">Who we are</a></li>
						<li><a href="#">Our clients</a></li>
						<li><a href="#">Contact us</a></li>
						<li><a href="#">Blog</a></li>
					</ul>
				</div><!-- column -->

				<div class="span3 men-box text-center">
					<h4>SERVICES</h4>
					<ul>
						<li><a href="#">Web development</a></li>
						<li><a href="#">Mobile development</a></li>
						<li><a href="#">SEO services</a></li>
						<li><a href="#">SEM services</a></li>
						<li><a href="#">Design</a></li>
					</ul>
				</div><!-- column -->

				<div class="span3 men-box text-center">
					<h4>CONNECT</h4>
					<ul>
						<li><a href="#">Linked in</a></li>
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Google plus</a></li>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Behance</a></li>
						<li><a href="#">Dribble</a></li>
					</ul>
				</div><!-- column -->

				<div class="span3 men-box text-center">
					<h4>CONTACTS</h4>
					<address>
						a: 15 Street name, London
						<br>e: info@aimgine.com
						<br>t: +359 899 877 177
						<br>skype: aimgine
						<br>w: www.aimgine.com
					</address>
				</div><!-- column -->

		</div><!-- row -->

		<p class="copyrights">
			<span>© 2013 – Aimgine agency.</span>
		</p>

</div><!-- container -->
</footer><!-- footer -->


</body>
</html>
