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

<script type="text/javascript" src="{{URL::to('js/modernizr.min.js')}}"></script>
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
					<img src="{{URL::to('images/aimgine-logo-mobile.png')}}" class="visible-phone" alt="Aimgine logo">
				</a>
				<a href="#top" class="logo-gototop scroll-btn">
					<img src="{{URL::to('images/aimgine-logo-mobile.png')}}" alt="Aimgine logo">
				</a>
				<a href="#GetQuote" class="but get-quote" role="button" data-toggle="modal">Get a quote</a>

		</div><!-- container -->
		</div><!-- main bar -->

<span class="cuted-span white"></span>
</header>

<section>


		<section class="main-section gray-bar">
		<div class="container">

				<header class="in_header text-center">
					<h3>Work</h3>
				</header><!-- in_header -->


				<section class="in_section">

						<div class="filtering-links text-center">
                            <a href="{{URL::to('/work')}}" class="current">All</a>
                            @foreach($workCategories as $cat)
                            <?php $catName = str_replace(' ','-',$cat->name); ?>

                            <a href="{{URL::to('/work/'.$catName.'/'.$cat->id)}}" class="current">{{$cat->name}}</a>

                            @endforeach
						</div><!-- filtering links -->

						<div class="row">

								<div class="span12 project-ifno">
										<span class="label-new">new</span>
										<a href="#" class="show-info"><h2>{{$project->name}}</h2></a>

										<div class="project-full-info">
										<a href="#" class="btn-close">x</a>
										<div class="row">

												<div class="span6">
														<h2>Project name here, long project name</h2>
														<p><em>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</em></p>
														<p class="link">Launch website: <a href="#">www.website.com</a></p>
												</div><!-- span6 column -->

												<div class="span6">
														<h4>Share this project</h4>
														<p>
															!-- source code for the social buttons comes here --!
														</p>
												</div><!-- span6 column -->

										</div><!-- row -->
										</div><!-- full info -->

										<div class="project-pnav">

											<div class="project-image">
                                                @foreach($projectImages as $image)
												<img src="{{URL::to('content/img/projects/'.$image->image)}}" alt=" ">
                                                @endforeach
											</div><!-- project current images -->

											<a href="#" class="project_go_prev visible-desktop"><img src="images/portfolio/paging-project-1.png" alt=" "></a>
											<a href="#" class="project_go_next visible-desktop"><img src="images/portfolio/paging-project-2.png" alt=" "></a>

										</div><!-- project-pnav -->

								</div><!-- project -->

						</div><!-- row -->


						<!-- RELATED WORK -->
						<div class="row">

								<aside class="related-work projects-thumbs">

										<header class="in_header text-center">
											<h3>RELATED WORK</h3>
										</header><!-- in_header -->
										@foreach($relProjects as $project)

											@foreach($images as $image)
			                                    @if($project->thumbnail == $image->id)
			                                        <?php $pImage = $image->image; ?>
			                                    @endif
			                                @endforeach
											@foreach($workCategories as $cat)
			                                    @if($project->category_id == $cat->id)
			                                        <?php $catName = str_replace(' ','-',$cat->name); ?>
			                                    @endif

			                                @endforeach
											<?php $projName = str_replace(' ','-',$project->name); ?>
										<div class="span3 thumb_holder">
											<a href="{{URL::to('work/'.$catName.'/'.$projName.'/'.$project->id)}}" class="img_h">
												<img src="{{URL::to('content/img/projects/'.$pImage)}}" alt="Alt comes here">
												<span class="hover"></span>
											</a><!-- img hold -->
											<h4>{{$project->name}}</h4>
											<span class="type">Project type</span>
											<span class="label-new">new</span>
										</div><!-- column -->
										@endforeach




										<div class="span12 text-center btn-holder">
											<a href="#" class="btn-rounded-green wide">More</a>
										</div><!-- button area-->

								</aside><!-- related work -->

						</div><!-- row -->

				</section><!-- in section -->


				<footer class="text-center">
					<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Freference%2Fplugins%2Flike&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:25px;" allowTransparency="true"></iframe>
				</footer>

		</div><!-- container -->
		<span class="cuted-span gray"></span>
		</section><!-- main -->



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
