@extends('userViews.layout.app')

@section('title','Log in')

@section('content')
    {{-- day la trang login --}}
<!--cần xây dựng giao diện và form,chức năng đăng nhập (15/10/2025 trongphuc)-->
<div class="login">
	<div class="container">
		<h3>LOG-IN</h3>
		<p>Please log-in if you do have an account.</p>
		<form>
            {{-- đăng kí tên user email mat khau nhap lại mật khẩu --}}
			 <input class="user" type="text" placeholder="USER NAME" required=""><br>
			 <input class="user" type="password" placeholder="PASSWORD" required="">
			 <input type="submit" value="SEND">
		</form>
	</div>
</div>
@endsection