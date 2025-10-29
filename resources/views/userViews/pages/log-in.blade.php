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
			 
			 <input id="login_text_userName" class="user" type="text" placeholder="USER NAME" required="">
			 <span style="display: none" id="login_userName_error">Username cannot contain spaces or special characters</span>
			 <input id="login_text_userPassword" class="user" type="password" placeholder="PASSWORD" required="">
			 <span style="display: none" id="login_userPassword_error">Password must contain at least one uppercase letter and at least one number</span>
			 <br>
			 <br>
			 <input type="submit" value="SEND" onclick=checkUser()>
		</form>
	</div>
</div>
<script>
	//(29/10/2025) Gia Kiet Script kiem tra nhap thong tin dang nhap user
	function isHasSpecialChar( string ){
		for (let c of string){
			// Tung cum lay ki tu khong thuoc khoang do
			// Khi 1 ki tu khong thuoc bat ki khoang nao => ki tu dac biet
    		if (!(c >= 'A' && c <= 'Z') && !(c >= 'a' && c <= 'z') && !(c >= '0' && c <= '9')) {
      			return true; 
			}	
		}
  		return false;
	}
	function checkUserName(){
		let textUserName = document.getElementById('login_text_userName').value;
		let isHasSpace = (textUserName.includes(' '));
		if (isHasSpace || isHasSpecialChar(textUserName)){
			//khong hop le
			document.getElementById('login_userName_error').setAttribute('style','display: block');
			return false;
		}
		else{
			document.getElementById('login_userName_error').setAttribute('style','display: none');
			return true;
		}
	}

	function isHasUpCase( string ){
		if (string !== string.toLowerCase()){
			return true;
		}
		return false;
	}
	function isHasNumber( string ){
		for (let c of string){
			if ( c <= 9 && c >= 0){
				return true
			}
		}
		return false;
	}
	function checkPassword() {
		//mat khau phai du 8 ki tu, 1 hoa va 1 so
		let textPassword = document.getElementById('login_text_userPassword').value;
		console.log(textPassword);
		console.log(textPassword.length);
		console.log(isHasUpCase(textPassword));
		console.log(isHasNumber(textPassword));

		if ( (textPassword.length>=8) && isHasUpCase(textPassword) && isHasNumber(textPassword)){
			//dung
			document.getElementById('login_userPassword_error').setAttribute('style','display: none');
			return true;
			
		}
		else{
			//sai
			document.getElementById('login_userPassword_error').setAttribute('style','display: block');
			return false;
			
		}

	}

	function checkUser(){
		if (checkUserName() && checkPassword()){
			console.log("kiem tra dung ");
			alert('dung thong tin');
		}
		else {
			//ham khong cho load lai trang
			event.preventDefault();
		}
	}
</script>
@endsection