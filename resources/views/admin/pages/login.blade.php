@include('admin.partials.linkcss')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="/admin/dangnhap">
                            @csrf
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Tai-khoan" name="taikhoan" type="text" required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mat-khau" name="matkhau" type="password" value="" required>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="remember me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <!--<a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                            <button type="submit">Đăng nhập</button>
                            @if (session('error'))
                                <h2>{{session('error')}}</h2>
                            @endif
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.partials.javascript')