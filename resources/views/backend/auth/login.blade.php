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
   <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
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
     var SUFFIX = '{{ config('apps.general.suffix') }}'
   </script>
</head>

<body class="fix-menu">
   @include('backend.dashboard.common.loader')
    <section class="login-block">

        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <!-- Authentication card start -->
                        <form method="post" action={{ route('auth.login') }} class="md-float-material form-material">
                           @csrf
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Đăng nhập vào hệ thống</h3>
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                    <div class="box-body">
                                       <div class="alert alert-danger">
                                         @foreach ($errors->all() as $error)
                                             <p>{{ $error }}</p>
                                         @endforeach
                                       </div>
                                    </div><!-- /.box-body -->
                                    @endif
                                    <div class="form-group form-primary">
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control"  placeholder="Nhập vào email của bạn">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="password" class="form-control"  placeholder="Mật khẩu">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="forgot-phone text-right f-right">
                                                <a href="" class="text-right f-w-600"> Quên Mật Khẩu?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" name="login" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Đăng Nhập</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left m-b-0">Cảm ơn.</p>
                                            <p class="text-inverse text-left"><a href="."><b class="f-w-600">Quay trở về website</b></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <!-- Warning Section Ends -->
   <!-- Required Jquery -->


   <script type="text/javascript" src="{{ PUBLIC_URL }}files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
   <script type="text/javascript" src="{{ PUBLIC_URL }}files/bower_components/popper.js/js/popper.min.js"></script>
   <script type="text/javascript" src="{{ PUBLIC_URL }}files/bower_components/bootstrap/js/bootstrap.min.js"></script>

   <!-- modernizr js -->
   <script type="text/javascript" src="{{ PUBLIC_URL }}files/bower_components/modernizr/js/modernizr.js"></script>
   <!-- Chart js -->
   <script src="{{ PUBLIC_URL }}files/assets/pages/widget/amchart/serial.js"></script>
   <script src="{{ PUBLIC_URL }}files/assets/pages/widget/amchart/light.js"></script>
   <script src="{{ PUBLIC_URL }}files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script type="text/javascript" src="{{ PUBLIC_URL }}files/assets/js/SmoothScroll.js"></script>
   <script src="{{ PUBLIC_URL }}files/assets/js/pcoded.min.js"></script>
   <!-- custom js -->
   <script src="{{ PUBLIC_URL }}files/assets/js/vartical-layout.min.js"></script>
   <script type="text/javascript" src="{{ PUBLIC_URL }}files/assets/js/script.min.js"></script>
  <script src="{{ PUBLIC_URL }}libraries/module/system.js"></script>


</body>

</html>
