<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $judul }} | Sipmak v1.0</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/images/icon/favicon-16x16.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/formlogin/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/formlogin/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/formlogin/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/formlogin/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/formlogin/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/formlogin/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/formlogin/css/util.css">
    <link rel="stylesheet" type="text/css" href="/formlogin/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-160 p-t-50">
                <form class="login100-form validate-form" method="POST" action="/login">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Sipmak Login
                    </span>

                    <div class="wrap-input100 rs1 validate-input" data-validate="Username is required">
                        <input class="input100" type="text" name="username">
                        <span class="label-input100">Username</span>
                    </div>


                    <div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Masuk
                        </button>
                    </div>

                    <div class="text-center w-full p-t-23">
                        <a href="#" class="txt1">
                            Lupa Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="/formlogin/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/formlogin/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/formlogin/vendor/bootstrap/js/popper.js"></script>
    <script src="/formlogin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/formlogin/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/formlogin/vendor/daterangepicker/moment.min.js"></script>
    <script src="/formlogin/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/formlogin/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/formlogin/js/main.js"></script>

</body>

</html>