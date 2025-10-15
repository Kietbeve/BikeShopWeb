<script src="{{ asset('userAsset/js/responsiveslides.min.js')}}"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
  <div class="{{ ($isPageHome)? 'banner-bg banner-bg1' : 'banner-bg banner-sec'}}">
{{--<div class="banner-bg banner-bg1"></div> --}}
	  <div class="container">
			 <div class="header">
			       <div class="logo">
						 <a href="/"><img src="{{ asset('userAsset/images/logo.png')}}" alt=""/></a>
				   </div>							 
				  <div class="top-nav">										 
						<label class="mobile_menu" for="mobile_menu">
						<span>Menu</span>
						</label>
						<input id="mobile_menu" type="checkbox">
					   <ul class="nav">
						  <li class="dropdown1"><a href="/bicycles">BICYCLES</a>
							  <ul class="dropdown2">
									<li><a href="bicycles.html">FIXED / SINGLE SPEED</a></li>
									<li><a href="bicycles.html">CITY BIKES</a></li>
									<li><a href="bicycles.html">PREMIMUN SERIES</a></li>												
							  </ul>
						  </li>
						  <li class="dropdown1"><a href="/parts">PARTS</a>
							 <ul class="dropdown2">
									<li><a href="parts.html">CHAINS</a></li>
									<li><a href="parts.html">TUBES</a></li>
									<li><a href="parts.html">TIRES</a></li>
									<li><a href="parts.html">DISC BREAKS</a></li>
							  </ul>
						 </li>      
						 <li class="dropdown1"><a href="/accessories">ACCESSORIES</a>
							 <ul class="dropdown2">
									<li><a href="accessories.html">LOCKS</a></li>
										<li><a href="accessories.html">HELMETS</a></li>
										<li><a href="accessories.html">ARM COVERS</a></li>
										<li><a href="accessories.html">JERSEYS</a></li>
							  </ul>
						 </li>               
						 <li class="dropdown1"><a href="/404">EXTRAS</a>
							 <ul class="dropdown2">
									<li><a href="404.html">CLASSIC BELL</a></li>
									<li><a href="/contact">CONTACT</a></li>
									<li><a href="/log-in">LOG IN</a></li>
									<li><a href="/sign-up">SIGN UP</a></li>
									<li><a href="404.html">BOTTLE CAGE</a></li>
									<li><a href="404.html">TRUCK GRIP</a></li>
							  </ul>
						 </li>
						  <a class="shop" href="cart.html"><img src="{{ asset('userAsset/images/cart.png')}}" alt=""/></a>
					  </ul>
				 </div>
				 <div class="clearfix"></div>
			 </div>
	  </div>
	@if ($isPageHome)
	  <div class="caption">
		 <div class="slider">
					   <div class="callbacks_container">
						   <ul class="rslides" id="slider">
							    <li><h1>HANDMADE BICYCLE</h1></li>
								<li><h1>SPEED BICYCLE</h1></li>	
								<li><h1>MOUINTAIN BICYCLE</h1></li>	
						  </ul>
						  <p>You <span>create</span> the <span>journey,</span> we supply the <span>parts</span></p>
						  <a class="morebtn" href="/bicycles">SHOP BIKES</a>
					  </div>
				  </div>
	 </div>
	 <div class="dwn">
		<a class="scroll" href="#cate"><img src=" {{ asset('userAsset/images/scroll.png')}}" alt=""/></a>
	 </div>	
	@endif
	</div>
