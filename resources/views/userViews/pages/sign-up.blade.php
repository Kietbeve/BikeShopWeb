@extends('userViews.layout.app')

@section('title','Sign up')

@section('content')
    {{-- Day la trang dang ky --}}
<!--cần xây dựng trang và form,chức năng đăng ký (15/10/2025 trongphuc)-->
<div class="signup">
	<div class="container">
		<h3>SIGN UP</h3>
		<p>Please sign up if you do not have an account.</p>
		<form>
            {{-- đăng kí tên user email mat khau nhap lại mật khẩu --}}
			 <input class="user" type="text" placeholder="USER NAME" required=""><br>
             <input class="user" type="text" placeholder="USER@GMAIL.COM" required=""><br>
			 <input class="user" type="password" placeholder="PASSWORD" required="">
			 <input class="user"type="text" placeholder="CONFIRM PASSWORD" required="">
			 <input type="submit" value="SEND">
		</form>
	</div>
</div>
@endsection