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
					<img src="{{URL::to('images/aimgine-logo.png')}}" class="hidden-phone" alt="Aimgine logo">
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


		<header class="green-bar head-bar wh-circles" data-stellar-background-ratio="0.75">
		<div class="wh-dotline">
		<div class="container" >

				<h3><span>SERVICES /</span> SEO</h3>

				<div class="services-navigation">

						<a href="#" class="pbtn btn-rounded-white pull-left">Mobile</a>
						<div class="curp-img"><img src="images/h-img-service-seo-white.png" alt="SEO"></div>
						<a href="#" class="pbtn btn-rounded-white pull-right">Design</a>

				</div><!-- services navigation -->

				<div class="page-descr text-center">
					<p>We offer a customer focused, goal oriented, and step-by-step process explaining approach targeted at professionals and clients alike.</p>
				</div><!-- page description -->

		<span class="cuted-span green"></span>
		</div><!-- container -->
		</div><!-- white dots line -->
		</header><!-- header green bar -->



		<section class="main-section">

				<section class="serv-description">
				<div class="container">
				<div class="row">

						<div class="span6 text-center">
							<h3>SEO services with money back guarantee</h3>
							<p>There’s no catch if Aimgine doesn’t put your page on page 1 of Google’s results for the desired key phrase, we give you back 100% of your money. That’s it, plain and simple. Because we don’t just do SEO, we get it done.</p>
						</div><!-- span 6 -->

						<div class="span6 text-center">
							<h3>Search engine optimization start to finish</h3>
							<p>Search engine optimization at Aimgine is not a service but a thorough step by step process we undertake. Our work is always result oriented (hence our guarantee) and tailored to the specific needs of your website. So let’s break it down into stages:</p>
						</div><!-- span 6 -->

				</div><!-- row -->
				</div><!-- container -->
				<span class="cuted-span white"></span>
				</section><!-- service description part -->



				<section class="gray-bar holder">
				<div class="container">
				<div class="row">

						<header class="in_header text-center">
							<h3>Our Services</h3>
						</header><!-- in_header -->

						<section class="in_section">
							<ul class="ulli-dotted span8 center-column">
								<li>
									<span class="ulli-pointer"></span>
									<h4>Introduction</h4>
									<p>First of all we strive to get a full grasp of your website’s current situation: key phrases, page rank, quality of content, internal & external links and of course where does it stand compared to the competition.</p>
								</li>
								<li>
									<span class="ulli-pointer"></span>
									<h4>Testing very long text 1</h4>
									<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
								</li>
								<li>
									<span class="ulli-pointer"></span>
									<h4>Setting goals</h4>
									<p>After presenting you a detailed overview of your website in term of search engine optimisation it’s time set some goals. We will help you clear your priorities, and create a list of realistic milestones so that at the end your website stands out both in terms of SEO and user experience.</p>
								</li>
								<li>
									<span class="ulli-pointer"></span>
									<h4>Implementation</h4>
									<p>The plan is ready, so let’s roll up our sleeves and do the SEO magic. Everything we agreed upon will be done in time, hassle free.</p>
								</li>
								<li>
									<span class="ulli-pointer"></span>
									<h4>Full report</h4>
									<p>Once done with optimizing your site for the search engines we will prepare a detailed overview of the work done and the achieved results as well as useful guidelines for further support of your website.</p>
								</li>
								<li>
									<span class="ulli-pointer"></span>
									<h4>Testing very long text 2</h4>
									<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
								</li>
							</ul><!-- span8 -->

							<div class="btn-holder text-center">
								<a href="#" class="btn-rounded-green wide">GET IN TOUCH</a>
							</div>

						</section>

				</div><!-- row -->
				<span class="cuted-span gray"></span>
				</div><!-- container -->
				</section><!-- section end -->



		</section>



		<section class="client-quotes">
		<div class="container">

				<header class="in_header text-center">
					<h3>Our Services</h3>
				</header><!-- in_header -->

				<div class="sliding-quotes">

						<!-- row -->
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
