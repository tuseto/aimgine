<nav class="site-nav">
<ul>
    <li><a href="{{URL::to('/')}}" class="current">HOME</a></li>
    <li class="sub_menu"><a href="{{URL::to('/work')}}">WORK</a>
        <div class="in_sub_menu">
            @foreach($workCategories as $cat)
            <?php $catName = str_replace(' ','-',$cat->name); ?>
            <a href="{{URL::to('/work/'.$catName.'/'.$cat->id)}}"><span>{{$cat->name}}</span></a>
            @endforeach
        <span></span>
        </div><!--sub menu holder-->
    </li>
    <li class="sub_menu"><a href="javascript:;">WHAT WE DO</a>
        <div class="in_sub_menu">
            @foreach($wedoCategories as $cat)
            <?php $catName = str_replace(' ','-',$cat->name); ?>

            <a href="{{URL::to('/our-services/'.$catName.'/'.$cat->id)}}"><span>{{$cat->name}}</span></a>
            @endforeach
        <span></span>
        </div><!--sub menu holder-->
    </li>
    <li><a href="{{URL::to('/who-we-are/team')}}">WHO WE ARE</a></li>
    <li><a href="{{URL::to('/our-clients')}}">OUR CLIENTS</a></li>
    <li><a href="{{URL::to('/contact-us')}}">CONTACT US</a></li>
    <li><a href="{{URL::to('/blog')}}">BLOG</a></li>
</ul>
</nav>
