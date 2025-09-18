@extends("customer.customer_layout")
@section("content")
<!--bikes-->
<div class="bikes">	
		 <h3>POPULAR BIKES</h3>
		 <div class="bikes-grids">			 
			 <ul id="flexiselDemo1">
				 <li>
					 <img src="{{asset("images/bik1.jpg")}}" alt=""/>
					 <div class="bike-info">
						 <div class="model">
							 <h4>FIXED GEAR<span>$249.00</span></h4>							 
						 </div>
						 <div class="model-info">
						     <select>
							  <option value="volvo">OPTION</option>
							  <option value="saab">Option</option>
							  <option value="opel">Option</option>
							  <option value="audi">Option</option>
							 </select>
							 <a href="bicycles.html">BUY</a>
						 </div>						 
						 <div class="clearfix"></div>
					 </div>
					 <div class="viw">
						<a href="bicycles.html">Quick View</a>
					 </div>
				 </li>
				 <li>
				 <img src="{{asset("images/bik2.jpg")}}" alt=""/>
				 <div class="bike-info">
						 <div class="model">
							 <h4>BIG BOY ULTRA<span>$249.00</span></h4>							 
						 </div>
						 <div class="model-info">
						     <select>
							  <option value="volvo">OPTION</option>
							  <option value="saab">Option</option>
							  <option value="opel">Option</option>
							  <option value="audi">Option</option>
							 </select>
							 <a href="bicycles.html">BUY</a>
						 </div>						 
						 <div class="clearfix"></div>
					 </div>
					 <div class="viw">
						<a href="bicycles.html">Quick View</a>
					 </div>
				 </li>
		    </ul>
			<script type="text/javascript">
			 $(window).load(function() {			
			  $("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover:true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
			</script>
			<script type="text/javascript" src="{{asset("js/jquery.flexisel.js")}}"></script>			 
	</div>
</div>
<!---->
<div class="contact">
	<div class="container">
		<h3>CONTACT US</h3>
		<p>Please contact us for all inquiries and purchase options.</p>
		<form method="POST" action="/product/contact">
			@csrf
			<!-- đặc tên cho input name để lấy dữ liệu (18/9/2025)-->
			 <input type="text" placeholder="NAME" required="" name= "name">
			 <input type="text" placeholder="SURNAME" required="">			 
			 <input class="user" type="text" placeholder="USER@DOMAIN.COM" required="" name="email"><br>
			 <textarea placeholder="MESSAGE"></textarea>
			 <input type="submit" value="SEND">
		</form>
	</div>
</div>
<!---->
@endsection