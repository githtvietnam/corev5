<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="{{ BASE_URL }}">
        <title>{{ $config['meta_title'] }}</title>
        <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 10]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="#">
        <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
        <meta name="author" content="#">
        <!-- Favicon icon -->
        <link rel="icon" href="{{ PUBLIC_URL }}files/assets/images/favicon.ico" type="image/x-icon">
        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="{{ PUBLIC_URL }}files/bower_components/bootstrap/css/bootstrap.min.css">
        @if(isset($config['select2']) && $config['select2'] == config('apps.general.select2'))
        <link href="{{ PUBLIC_URL }}libraries/select2/dist/css/select2.min.css" rel="stylesheet" />
        @endif
        <link rel="stylesheet" type="text/css" href="{{ PUBLIC_URL }}files/assets/icon/themify-icons/themify-icons.css">
        <!-- feather Awesome -->
        <link rel="stylesheet" type="text/css" href="{{ PUBLIC_URL }}files/assets/icon/feather/css/feather.css">
        <link rel="stylesheet" type="text/css" href="{{ PUBLIC_URL }}files/assets/css/sweetalert.css">
        @if(isset($config['switchery']) && $config['switchery'] == config('apps.general.switchery'))
        <link rel="stylesheet" type="text/css" href="{{ PUBLIC_URL }}files/bower_components/switchery/css/switchery.min.css">
        @endif
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="{{ PUBLIC_URL }}files/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="{{ PUBLIC_URL }}files/assets/css/customize.css">
        <link rel="stylesheet" type="text/css" href="{{ PUBLIC_URL }}files/assets/css/jquery.mCustomScrollbar.css">
        <script type="text/javascript" src="{{ PUBLIC_URL }}files/bower_components/jquery/js/jquery.min.js"></script>
        <script type="text/javascript">
        var BASE_URL = '{{ BASE_URL }}'
        var SUFFIX = '{{ config('
        apps.general.suffix ') }}'
        </script>
    </head>
    <body>
        <!-- Pre-loader start -->
        @include('backend/dashboard/common/loader')
        <!-- Pre-loader end -->
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                @include('backend/dashboard/common/nav')
                <!-- Sidebar chat start -->
                <!-- Sidebar inner chat start-->
                <!-- Sidebar inner chat end-->
                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
                        @include('backend/dashboard/common/aside')
                        @include($template)
                        <div id="styleSelector"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->


    <script type="text/javascript" src="{{ PUBLIC_URL }}files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ PUBLIC_URL }}files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="{{ PUBLIC_URL }}files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ PUBLIC_URL }}files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <!-- modernizr js -->
    <script type="text/javascript" src="{{ PUBLIC_URL }}files/bower_components/modernizr/js/modernizr.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ PUBLIC_URL }}files/bower_components/chart.js/js/Chart.js"></script>
    <!-- amchart js -->
    <script src="{{ PUBLIC_URL }}files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="{{ PUBLIC_URL }}files/assets/pages/widget/amchart/serial.js"></script>
    <script src="{{ PUBLIC_URL }}files/assets/pages/widget/amchart/light.js"></script>
    <script src="{{ PUBLIC_URL }}files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="{{ PUBLIC_URL }}files/assets/js/SmoothScroll.js"></script>
    <script type="text/javascript" src="{{ PUBLIC_URL }}files/assets/js/sweetalert.min.js"></script>


    @if(isset($config['switchery']) && $config['switchery'] == config('apps.general.switchery'))
    <script type="text/javascript" src="{{ PUBLIC_URL }}/files/bower_components/switchery/js/switchery.min.js"></script>
    <script type="text/javascript" src="{{ PUBLIC_URL }}files/assets/pages/advance-elements/swithces.js"></script>
    @endif


    <script src="{{ PUBLIC_URL }}files/assets/js/pcoded.min.js"></script>
    <!-- custom js -->
    <script src="{{ PUBLIC_URL }}files/assets/js/vartical-layout.min.js"></script>
    <script type="text/javascript" src="{{ PUBLIC_URL }}files/assets/js/script.min.js"></script>

    @if(isset($config['ckeditor']) && $config['ckeditor'] == config('apps.general.ckeditor'))
   <script src="{{ PUBLIC_URL }}libraries/ckeditor/ckeditor.js"></script>
   <script src="{{ PUBLIC_URL }}libraries/ckfinder/ckfinder.js"></script>
   <script src="{{ PUBLIC_URL }}libraries/module/editor.js"></script>
   <script src="{{ PUBLIC_URL }}libraries/module/finder.js"></script>
   @endif



   @if(isset($config['select2']) && $config['select2'] == config('apps.general.select2'))
   <script src="{{ PUBLIC_URL }}libraries/select2/dist/js/select2.min.js"></script>
   @endif

   <script src="{{ PUBLIC_URL }}libraries/module/system.js"></script>

   @if(isset($config['js']))
      <script src="{{ PUBLIC_URL }}libraries/module/{{ $config['js'] }}.js"></script>
   @endif
   @if(isset($config['seo']) && $config['seo'] == config('apps.general.seo'))
   <script src="{{ PUBLIC_URL }}libraries/module/seo.js"></script>
   @endif

</body>

</html>
