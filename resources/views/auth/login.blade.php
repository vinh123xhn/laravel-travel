<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cơ sở dữ liệu du lịch Huế - Đăng nhập</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href={{asset("vendors/bootstrap/dist/css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset('vendors/font-awesome/css/font-awesome.min.css')}}>
    <link rel="stylesheet" href={{asset('vendors/themify-icons/css/themify-icons.css')}}>
    <link rel="stylesheet" href={{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}>
    <link rel="stylesheet" href={{asset('vendors/selectFX/css/cs-skin-elastic.css')}}>

    <link rel="stylesheet" href={{asset('assets/css/style.css')}}>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form action="{{route('auth.postLogin')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input type="text" class="form-control" placeholder="Tên đăng nhập" required="required" name="username">

                        @error('username')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Mật khẩu" required="required" name="password">

                        @error('password')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="checkbox">
                        <label class="pull-right">
                            <a href="{{route('auth.getForgotPassword')}}">Forgot Password?</a>
                        </label>

                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src={{asset('vendors/jquery/dist/jquery.min.js')}}></script>
<script src={{asset('vendors/popper.js/dist/umd/popper.min.js')}}></script>
<script src={{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}></script>
<script src={{asset('assets/js/main.js')}}></script>


</body>
</html>
