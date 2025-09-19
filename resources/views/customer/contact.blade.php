@extends("customer.customer_layout")<!--18/09/2025 kietbeve-->
@section("content")
<form method="POST" action="/product/contact">
			@csrf
			<!-- đặc tên cho input name để lấy dữ liệu (18/9/2025)-->
			<input type="text" placeholder="NAME" required="" name= "name">
			<span>	
				@if (session('errors.name'))
		  		<strong class="bg-danger text-danger">Lỗi! {{session('errors.name')}}</strong>
				@endif
			</span>
			<br>
			<input type="text" placeholder="phone" required="" name= "phone">
			<span>	
				@if (session('errors.phone'))
		  		<strong class="bg-danger text-danger">Lỗi! {{session('errors.phone')}}</strong>
				@endif
			</span>
			<br>		 
			<input class="user" type="text" placeholder="USER@DOMAIN.COM" required="" name="email">
			<span>	
				@if (session('errors.email'))
		  		<strong class="bg-danger text-danger">Lỗi! {{session('errors.email')}}</strong>
				@endif
			</span>
			<br>
            <input type="text" placeholder="TIEUDE" required="" name= "tieude">
						<span>	
				@if (session('errors.tieude'))
		  		<strong class="bg-danger text-danger">Lỗi! {{session('errors.tieude')}}</strong>
				@endif
			</span>
			<br>
			<textarea placeholder="MESSAGE" name="noidung"></textarea>
						<span>	
				@if (session('errors.noidung'))
		  		<strong class="bg-danger text-danger">Lỗi! {{session('errors.noidung')}}</strong>
				@endif
			</span>
			<br>
			<input type="submit" value="SEND">
            @isset($status)

				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<strong>Thành công!</strong> 
				<p>Liên hệ bạn đã gửi gồm: </p>
				<p>Tên: {{$name}}</p>
				<p>SDT: {{$phone}}</p>
				<p>Mail: {{$email}}</p>
				<p>Tiêu đề liên hệ: {{$tieude}}</p>
				<p>Nội dung: {{$noidung}}</p>
				</div>
            @endisset
		</form>
@endsection