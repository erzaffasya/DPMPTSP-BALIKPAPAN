<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="https://seeklogo.com/images/P/pemkot-balikpapan-logo-1B75350134-seeklogo.com.png">
    <title>DPMPTSP - KOTA BALIKPAPAN</title>
    <link href="{{asset("tlandingpage/assets/css/themify-icons.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/flaticon.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/animate.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/owl.carousel.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/owl.theme.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/slick.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/slick-theme.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/swiper.min.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/owl.transitions.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/jquery.fancybox.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/odometer-theme-default.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/component.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/sass/style.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/responsive.css")}}" rel="stylesheet">
    <link href="{{asset("tlandingpage/assets/css/design.css")}}" rel="stylesheet">
</head>
    <div class="wpo-login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="wpo-accountWrapper" action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="wpo-accountInfo">
                            {{-- <div class="wpo-accountInfoHeader">
                                <a href="#"><img src="{{asset('tlandingpage/assets/images/logo2.png')}}" alt="" height="50px"></a>
                            </div>
                            <div class="image">
                                <img src="{{asset('tlandingpage/assets/images/login.svg')}}" alt="">
                            </div> --}}
                        </div>
                        <div class="wpo-accountForm form-style">
                            <div class="text-center">
                                <img src="{{asset("tlandingpage/assets/images/logo_kecil.png")}}" height="70" alt="" >
                                <br>
                                <br>
                                <div class="fromTitle">
                                    <h2>Login</h2>
                                    <p>Sign into your pages account</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <label>Email</label>
                                    <input type="text" id="email" name="email" placeholder="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="pwd6" type="password" placeholder="" value=""
                                            name="password">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default reveal6" type="button"><i
                                                    class="ti-eye"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <button type="submit" class="wpo-accountBtn">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset("tlandingpage/assets/js/jquery.min.js")}}"></script>
    <script src="{{asset("tlandingpage/assets/js/bootstrap.bundle.min.js")}}"></script>
    <!-- Plugins for this template -->
    <script src="{{asset("tlandingpage/assets/js/modernizr.custom.js")}}"></script>
    <script src="{{asset("tlandingpage/assets/js/jquery-plugin-collection.js")}}"></script>
    <!-- Custom script for this template -->
    <script src="{{asset("tlandingpage/assets/js/script.js")}}"></script>
