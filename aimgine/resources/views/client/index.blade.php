<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>Aimgine - Homepage</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/dropkick.css" rel="stylesheet" type="text/css">

<!-- Google web fonts -->
<link href='http://fonts.googleapis.com/css?family=Exo:300,400,500,600,700, 800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

<!-- JS -->
<script type="text/javascript" src="js/modernizr.min.js"></script>
<script>
Modernizr.load({
	  test: Modernizr.touch,
	  nope: ['js/jquery.stellar.min.js']
	});
</script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.slides.min.js"></script>
<script type="text/javascript" src="js/jquery.dropkick-1.0.3.js"></script>
<script type="text/javascript" src="js/site.js"></script>
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

		<section class="home-slider">
            @foreach($slider as $slide)
            <div>
                <div class="img-back-hold" style="background-image: url('{{URL::to('content/img/sliders/'.$slide->image)}}');" data-stellar-background-ratio="0.7">
                    <!-- <img src="images/home-slider/example-1.jpg">
                        Взимаме SRC на изображението и го поставяме като заден фон
                        за да предотрватим разминаването на различните у-ва.
                    -->
                    <div class="content-placer">
                        <h2>
                            <span>{{$slide->text}}</span>
                            <a href="#" class="btn-readmore">Read more</a>
                        </h2>
                    </div><!-- content -->
                </div>
            </div><!-- row -->
            @endforeach




			<a class="slidesjs-previous slidesjs-navigation hidden-phone" href="#" title="Previous">Previous</a>
			<a class="slidesjs-next slidesjs-navigation hidden-phone" href="#" title="Next">Next</a>
		</section><!-- home-slider -->



		<section class="home-about">
		<div class="ha-slice"></div><!-- up slice -->
		<div class="container">

				<header class="in_header text-center">
					<h3>About</h3>
				</header><!-- in_header -->

				<section class="in_section span8 center-column text-center">
					<div class="shape-about"></div>
                    <p>
                        @if($entrytext !== null)
                        {{$entrytext->text}}
                        @endif
                    </p>
					<a href="#" class="btn-rounded-white">More facts</a>
				</section><!-- in_section -->

		<span class="cuted-span green"></span>
		</div><!-- container -->
		</section><!-- about us -->



		<div class="home-services-wrap" data-stellar-background-ratio="0.85">
		<section class="home-services">
		<div class="container">

				<header class="in_header text-center">
					<h3>Our Services</h3>
				</header><!-- in_header -->

				<section class="in_section row">
                        @foreach($services as $service)
                        <div id="serv1" class="span3 s_box">
                            <div class="i_hold">
                                <img src="{{URL::to('content/img/services/'.$service->svg)}}" alt="Web">
                            </div><!-- img hold -->

                            <h3><a href="#">{{$service->name}}</a></h3>
                            <p>{{$service->text}}</p>
                        </div><!-- column -->
                        @endforeach




				</section><!-- in_section row -->


				<footer class="fbut-part text-center">
					<div class="sep-line hidden-phone"></div>

					<a href="#" class="btn-rounded-green">MORE SERVICES</a>
				</footer><!-- down part -->

		<span class="cuted-span gray"></span>
		</div><!-- container -->
		</section><!-- services -->
		</div><!-- wrap -->




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

		</div><!-- container -->
		</section><!-- TESTOMONIALS -->




		<div class="fb-like-bar">
		<div class="container text-center">

				<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Freference%2Fplugins%2Flike&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:25px;" allowTransparency="true"></iframe>

		<span class="cuted-span gray"></span>
		</div><!-- container -->
		</div><!-- facebook like bar -->




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


<!-- Modal -->
<div id="GetQuote" class="modal text-center hide animated fadeInDown" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class="forgot-top">
			<p>You forgot to fill in the fields, marked with green.</p>
		<span class="cuted-span green"></span>
		</div>

		<div class="head-name">
			<h4>GET A QUOTE</h4>
		</div><!-- name -->

		<form class="form form-quote">

				<div class="f_row">
					<label class="l_head">Your name</label>
					<div><input type="text"></div>
				</div>

				<div class="f_row">
					<label class="l_head">E-mail</label>
					<div class="forgot"><input type="text"></div>
				</div>

				<div class="f_row">
					<label class="l_head">Phone</label>
					<div><input type="text"></div>
				</div>

				<div class="f_row">
					<label class="l_head">Project type</label>
					<div>
						<select name="project" class="js_select" tabindex="1">
							<option>Choose your project type ...</option>
							<option>Some option</option>
							<option>Some option</option>
							<option>Some option</option>
							<option>Some option</option>
						</select>
					</div>
				</div>

				<div class="f_row">
					<label class="l_head">Budget</label>
					<div>
						<select name="budget" class="js_select" tabindex="1">
							<option>Choose your project type ...</option>
							<option>Some budget</option>
							<option>Some budget</option>
							<option>Some budget</option>
							<option>Some budget</option>
						</select>
					</div>
				</div>

				<div class="f_row">
					<label class="l_head">Project description</label>
					<div><textarea></textarea></div>
				</div>

				<div class="f_row">
					<label class="l_head">Attach File (pdf, doc)</label>
					<div><input type="text"></div>
				</div>

				<div class="f_row last">
					<button type="button" class="invert">Send</button>
				</div>

		</form><!-- form quote -->

</div><!-- modal -->

</body>
</html>
