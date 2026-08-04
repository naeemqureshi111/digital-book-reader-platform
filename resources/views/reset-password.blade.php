<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Rohan-Admin Dashboard Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="/assets/images/icon.ico">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="panel panel-color panel-primary panel-pages">

            <div class="panel-body">
                <h3 class="text-center m-t-0 m-b-30">
                    <span class=""><img src="/assets/images/RohanLogo.png" alt="logo" height="32"></span>
                </h3>
                <h4 class="text-muted text-center m-t-0"><b>Reset Your Password</b></h4>
                  <h4 class="text-muted text-center m-t-0"><b> <span class="error-1" id="error"></span></b></h4>
                <!-- Password Reset Form -->
                {{-- Reset Password Form --}}
   {{-- Error/Success Message Block --}}
@if (session('status'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="form-horizontal m-t-20" method="POST" action="{{ route('password.update') }}">
    @csrf

    {{-- Hidden Email and Token --}}
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">

    <!-- New Password Field -->
    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control" type="password" name="password" required placeholder="New Password">
        </div>
    </div>

    <!-- Confirm Password Field -->
    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control" type="password" name="password_confirmation" required placeholder="Confirm Password">
        </div>
    </div>

    <!-- Submit Button -->
    <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset Password</button>
        </div>
    </div>
</form>

               
            </div>

        </div>
    </div>

    <!-- JS files -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/modernizr.min.js"></script>
    <script src="/assets/js/detect.js"></script>
    <script src="/assets/js/fastclick.js"></script>
    <script src="/assets/js/jquery.slimscroll.js"></script>
    <script src="/assets/js/jquery.blockUI.js"></script>
    <script src="/assets/js/waves.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/jquery.nicescroll.js"></script>
    <script src="/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/assets/js/app.js"></script>

</body>
</html>
