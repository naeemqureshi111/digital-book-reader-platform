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


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="admin-dashboard" class="logo"><img src="assets/images/RohanLogo.png" height="28"></a>

                    <a href="admin-dashboard" class="logo-sm">
                        <a href="admin-dashboard" class="logo-sm"><img src="assets/images/RohanLogo.png"
                                height="36"></a>
                </div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">
                        <div class="pull-left">
                            <button type="button" class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="ion-navicon"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>
                        <form class="navbar-form pull-left" role="search">
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </form>

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="hidden-xs">
                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i
                                        class="fa fa-crosshairs"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle profile waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="true"><img
                                        src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/admin-dashboard"> Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/logout"> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->

        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <div class="user-details">
                    <div class="text-center">
                        <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle">
                    </div>
                    <div class="user-info">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">Mayank Jain</a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin-dashboard"> Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="/logout"> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="admin-dashboard" class="waves-effect"><i class="ti-home"></i><span> Dashboard
                                </span></a>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i></i> <span>
                                    Author</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="author">Add Author</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-book"></i> <span>Subject
                                </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="subject">Add Subject</a></li>
                                <li><a href="show-subject">Show Subject</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-blackboard"></i>
                                <span>Class</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="class">Add Class</a></li>
                                <li><a href="show-class">Show Class</a></li>
                            </ul>
                        </li>
                          <li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect">
        <i class="ti-notepad"></i>
        <span>Instruction</span>
        <span class="pull-right"><i class="mdi mdi-plus"></i></span>
    </a>
    <ul class="list-unstyled">
        <li><a href="instruction">Add Instruction</a></li>
        <li><a href="show-instruction">Show Instruction</a></li>
    </ul>
</li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect">
                                <i class="ti-agenda"></i> <!-- Updated icon for Chapter -->
                                <span>Chapter</span>
                                <span class="pull-right"><i class="mdi mdi-plus"></i></span>
                            </a>
                            <ul class="list-unstyled">
                                <li><a href="chapter">Add Chapter</a></li>
                                <li><a href="show-chapter">Show Chapter</a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-comment"></i>
                                <span>Question</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="question">Add Question</a></li>
                                <li><a href="show-question">Show Question</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-header-title">
                                <h4 class="pull-left page-title">Author</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="admin-dashboard">Admin</a></li>
                                    <li><a href="admin-dashboard">Dashboard</a></li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Add Author</h3>
                                </div>
                                <span class="error-1" id="error"></span>
                                <div class="panel-body">
                                    <form class="form-horizontal m-t-20" action="{{ route('register') }}"
                                        method="POST">
                                        @csrf

                                        <!-- First Name -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">First Name</label>
                                            <div class="col-md-10">
                                                <input type="text"
                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                    name="first_name" value="{{ old('first_name') }}"
                                                    placeholder="Enter First Name">
                                                @error('first_name')
                                                    <span class="text-danger"
                                                        id="first-name-error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Last Name -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Last Name</label>
                                            <div class="col-md-10">
                                                <input type="text"
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    name="last_name" value="{{ old('last_name') }}"
                                                    placeholder="Enter Last Name">
                                                @error('last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="example-email">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" id="example-email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" placeholder="Enter Email">
                                                @error('email')
                                                    <span class="text-danger" id="email-error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Password</label>
                                            <div class="col-md-10">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" placeholder="Enter Password">
                                                @error('password')
                                                    <span class="text-danger"
                                                        id="password-error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Mobile -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Mobile</label>
                                            <div class="col-md-10">
                                                <input type="text"
                                                    class="form-control @error('mobile') is-invalid @enderror"
                                                    name="mobile" value="{{ old('mobile') }}"
                                                    placeholder="Enter Mobile Number">
                                                @error('mobile')
                                                    <span class="text-danger" id="mobile-error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Subject Dropdown -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Subject</label>
                                            <div class="col-md-10">
                                                <select name="subject_id"
                                                    class="form-control @error('subject_id') is-invalid @enderror"
                                                    required>
                                                    <option value="" disabled selected>Select Subject</option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}"
                                                            {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                                            {{ $subject->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('subject_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="form-group text-center m-t-20">
                                            <div class="col-xs-12">
                                                <button class="btn btn-primary w-md waves-effect waves-light"
                                                    type="submit">Add Author</button>
                                            </div>
                                        </div>
                                    </form>



                                </div> <!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col -->
                    </div> <!-- End row -->

                </div>
                <!-- End Right content here -->

            </div>
            <!-- END wrapper -->


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
