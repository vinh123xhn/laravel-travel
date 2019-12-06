<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cơ sở dữ liệu du lịch Huế - @yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href={{asset("apple-icon.png")}}>
    <link rel="shortcut icon" href={{asset("favicon.ico")}}>

    <link rel="stylesheet" href={{asset("vendors/bootstrap/dist/css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("vendors/font-awesome/css/font-awesome.min.css")}}>
    <link rel="stylesheet" href={{asset("vendors/themify-icons/css/themify-icons.css")}}>
    <link rel="stylesheet" href={{asset("vendors/flag-icon-css/css/flag-icon.min.css")}}>
    <link rel="stylesheet" href={{asset("vendors/selectFX/css/cs-skin-elastic.css")}}>
    <link rel="stylesheet" href={{asset("vendors/jqvmap/dist/jqvmap.min.css")}}>


    <link rel="stylesheet" href={{asset("assets/css/style.css")}}>
    <link rel="stylesheet" href={{asset("css/myStyle.css")}}>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @yield('head')
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
@include('layout.element.left')
<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{asset('images/admin.jpg')}}" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> Thông tin chi tiết</a>

                        <a class="nav-link" href="#"><i class="fa fa-cog"></i> Cài đặt</a>

                        <a class="nav-link" href="{{route('auth.postLogout')}}"><i class="fa fa-power-off"></i> Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>@yield('where')</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">@yield('where_active')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        @yield('content')
    </div>
</div><!-- /#right-panel -->


<script src={{asset('vendors/jquery/dist/jquery.min.js')}}></script>
<script src={{asset('vendors/popper.js/dist/umd/popper.min.js')}}></script>
<script src={{asset("vendors/bootstrap/dist/js/bootstrap.min.js")}}></script>
<script src={{asset("assets/js/main.js")}}></script>


<script src={{asset("vendors/chart.js/dist/Chart.bundle.min.js")}}></script>
<script src={{asset("assets/js/dashboard.js")}}></script>
<script src={{asset("assets/js/widgets.js")}}></script>
<script src={{asset("vendors/jqvmap/dist/jquery.vmap.min.js")}}></script>
<script src={{asset("vendors/jqvmap/examples/js/jquery.vmap.sampledata.js")}}></script>
<script src={{asset("vendors/jqvmap/dist/maps/jquery.vmap.world.js")}}></script>

@yield('js')
<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>

</body>

</html>
