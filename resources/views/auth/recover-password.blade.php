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
    <title>Cơ sở dữ liệu du lịch Huế - Đặt lại mật khẩu</title>
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
            <div class="login-form">
                <form action="{{ route('auth.postRecoverPassword', $extra_token) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Reset password</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu mới">
                        @error('password')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                        <br>
                        <input type="password" class="form-control" name="comfirm_password" placeholder="Xác nhận mật khẩu">
                        @error('comfirm_password')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-b-15">Lưu</button>

                </form>
            </div>
        </div>
    </div>
</div>


<script src={{asset("vendors/jquery/dist/jquery.min.js")}}></script>
<script src={{asset("vendors/popper.js/dist/umd/popper.min.js")}}></script>
<script src={{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}></script>
<script src={{asset("assets/js/main.js")}}></script>


</body>

</html>
