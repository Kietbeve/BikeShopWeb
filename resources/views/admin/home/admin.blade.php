<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'Page ')</title>
    @include('admin.partials.linkcss')
    
</head>

<body>
    <div id="wrapper">
                    {{-- include heaer --}}
                    @include('admin.partials.header')
                    {{-- include navbar --}}
                    @include('admin.partials.sidebar')
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        {{-- Nội dung chính --}}
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        {{-- Nội dung từng trang sẽ được chèn vào đấy --}}
                        @yield('content')
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    @include('admin.partials.javascript')
    
</body>

</html>
