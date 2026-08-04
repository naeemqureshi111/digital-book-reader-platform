<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Rohan-Admin Dashboard Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="/assets/images/icon.ico">
    <!-- DataTables -->
    <link href="/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />


    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="/admin-dashboard" class="logo"><img src="/assets/images/RohanLogo.png"
                            height="28"></a>

                    <a href="/admin-dashboard" class="logo-sm">
                        <a href="/admin-dashboard" class="logo-sm"><img src="/assets/images/RohanLogo.png"
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
                                        src="/assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
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
                        <img src="/assets/images/users/avatar-1.jpg" alt="" class="img-circle">
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
                            <a href="/admin-dashboard" class="waves-effect"><i class="ti-home"></i><span> Dashboard
                                </span></a>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i></i>
                                <span>Author</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="/author">Add Author</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-book"></i> <span>Subject
                                </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="/subject">Add Subject</a></li>
                                <li><a href="/show-subject">Show Subject</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-blackboard"></i>
                                <span>Class</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="/class">Add Class</a></li>
                                <li><a href="/show-class">Show Class</a></li>
                            </ul>
                        </li>
  <li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect">
        <i class="ti-notepad"></i>
        <span>Instruction</span>
        <span class="pull-right"><i class="mdi mdi-plus"></i></span>
    </a>
    <ul class="list-unstyled">
        <li><a href="/instruction">Add Instruction</a></li>
        <li><a href="/show-instruction">Show Instruction</a></li>
    </ul>
</li>
                         <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect">
                                <i class="ti-agenda"></i> <!-- Updated icon for Chapter -->
                                <span>Chapter</span>
                                <span class="pull-right"><i class="mdi mdi-plus"></i></span>
                            </a>
                            <ul class="list-unstyled">
                                <li><a href="/chapter">Add Chapter</a></li>
                                <li><a href="/show-chapter">Show Chapter</a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-comment"></i>
                                <span>Question</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="/question">Add Question</a></li>
                                <li><a href="/show-question">Show Question</a></li>
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
                                <h4 class="pull-left page-title">Subject</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Admin</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Author Details</h3>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable-responsive"
                                        class="table table-striped table-bordered dt-responsive nowrap"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th>Classroom</th>
                                                <th>Subject</th>
                                                <th>Total Chapters</th>
                                                <th>View</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($counts as $count)
                                                <tr>
                                                    <td>{{ $classrooms->firstWhere('id', $count->classroom_id)->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $subjects->firstWhere('id', $count->subject_id)->name ?? 'N/A' }}
                                                    </td>
                                                    <td>
                                                        {{ $count->total }}

                                                    </td>
                                                    <td>
                                                       <a href="/subject/chapters/{{ $count->classroom_id }}/{{ $count->subject_id }}?user_id={{ $user_id ?? '' }}">
    View
</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>

                    </div> <!-- End Row -->

                </div> <!-- container -->

            </div> <!-- content -->


        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
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

    <script src="/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Datatables-->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables/responsive.bootstrap.min.js"></script>

    <script src="/assets/pages/dashborad.js"></script>

    <script src="/assets/js/app.js"></script>

</body>

</html>
