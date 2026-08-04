<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Rohan-Admin Dashboard Quiz</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/icon.ico">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">

                <div class="panel-body">
                    <h3 class="text-center m-t-0 m-b-30">
                        <span class=""><img src="assets/images/RohanLogo.png" alt="logo" height="32"></span>
                    </h3>
                    <h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>
                         <span class="text-muted text-center m-t-0  error-1" id="error"></span>
                   <form class="form-horizontal m-t-20" action="{{ route('login-data') }}" method="POST">
    @csrf

    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" required placeholder="Email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <span class="error1 error4" id="email-error"></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control" type="password" name="password" required placeholder="Password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <span class="error2 error3 error5 error6" id="password-error"></span>
        </div>
    </div>

    <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Login</button>
        </div>
    </div>

    <div class="form-group m-t-30 m-b-0">
        <div class="col-sm-7">
            <a href="forgot-password" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
        </div>
    </div>
</form>

                </div>

            </div>
        </div>



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>