<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cơ sở dữ liệu du lịch Huế - Quên mật khẩu</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href={{asset("vendors/bootstrap/dist/css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("vendors/font-awesome/css/font-awesome.min.css")}}>
    <link rel="stylesheet" href={{asset("vendors/themify-icons/css/themify-icons.css")}}>
    <link rel="stylesheet" href={{asset("vendors/flag-icon-css/css/flag-icon.min.css")}}>
    <link rel="stylesheet" href={{asset("vendors/selectFX/css/cs-skin-elastic.css")}}>

    <link rel="stylesheet" href={{asset("assets/css/style.css")}}>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <div class="login-logo">
                    <a href="{{route('auth.getLogin')}}"><b>Huế CIT</b></a>
                </div>
            <div class="login-form">
                <form action="{{route('auth.sendMail')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nhập Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-b-15">Thay đổi password mới</button>

                </form>
            </div>
                <p class="mt-3 mb-1">
                    <a href="{{route('auth.getLogin')}}">Đăng nhập</a>
                </p>
        </div>
    </div>
</div>


<script src={{asset('vendors/jquery/dist/jquery.min.js')}}></script>
<script src={{asset("vendors/popper.js/dist/umd/popper.min.js")}}></script>
<script src={{asset("vendors/bootstrap/dist/js/bootstrap.min.js")}}></script>
<script src={{asset("assets/js/main.js")}}></script>


</body>

</html>
