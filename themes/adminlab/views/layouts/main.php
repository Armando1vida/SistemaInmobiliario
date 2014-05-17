<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--><html lang="en"> <!--<![endif]-->

    <!--    <head>
            <meta charset="utf-8">
            <title> Admin Lab Dashboard</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="" name="description">
            <meta content="" name="author">
            <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
            <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            <link href="css/style_responsive.css" rel="stylesheet">
            <link href="css/style_default.css" rel="stylesheet" id="style_color">
    
            <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css">
            <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet">
            <link href="assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css">
    </head>-->

    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <!-- CSS FILES -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fonts/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
        <!--<link href="../../css/fonts/font-awesome.css" rel="stylesheet" type="text/css"/>-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style_responsive.css" />

        <script>
            var baseUrl = "<?php print Yii::app()->baseUrl . '/'; ?>";
            var themeUrl = "<?php print Yii::app()->theme->baseUrl . '/'; ?>";
        </script>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="fixed-top">

        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!--LOGO & NAVIGATION BAR-->
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->


        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div id="sidebar" class="nav-collapse collapse">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <div class="navbar-inverse">
                    <form class="navbar-search visible-phone">
                        <input type="text" class="search-query" placeholder="Search">
                    </form>
                </div>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                <!-- BEGIN SIDEBAR MENU -->
                <ul class="sidebar-menu">
                    <li class="has-sub active">
                        <a href="javascript:;" class="">
                            <span class="icon-box"> <i class="icon-dashboard"></i></span> Dashboard
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="index.html">Dashboard 1</a></li>
                            <li class="active"><a class="" href="index_2.html">Dashboard 2</a></li>

                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"> <i class="icon-book"></i></span> UI Elements
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="ui_elements_general.html">General</a></li>
                            <li><a class="" href="ui_elements_buttons.html">Buttons</a></li>

                            <li><a class="" href="ui_elements_tabs_accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a class="" href="ui_elements_typography.html">Typography</a></li>
                            <li><a class="" href="tree_view.html">Tree View</a></li>
                            <li><a class="" href="nestable.html">Nestable List</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"><i class="icon-cogs"></i></span> Components
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="calendar.html">Calendar</a></li>
                            <li><a class="" href="data_table.html">Data Table</a></li>
                            <li><a class="" href="grids.html">Grids</a></li>
                            <li><a class="" href="charts.html">Visual Charts</a></li>
                            <li><a class="" href="messengers.html">Conversations</a></li>
                            <li><a class="" href="gallery.html"> Gallery</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"><i class="icon-tasks"></i></span> Form Stuff
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="form_layout.html">Form Layouts</a></li>
                            <li><a class="" href="form_component.html">Form Components</a></li>
                            <li><a class="" href="form_wizard.html">Form Wizard</a></li>
                            <li><a class="" href="form_validation.html">Form Validation</a></li>
                            <li><a class="" href="dropzone.html">Dropzone File Upload </a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"><i class="icon-fire"></i></span> Icons
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="font_awesome.html">Font Awesome</a></li>
                            <li><a class="" href="glyphicons.html">Glyphicons</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"><i class="icon-map-marker"></i></span> Maps
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="maps_google.html"> Google Maps</a></li>
                            <li><a class="" href="maps_vector.html"> Vector Maps</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"><i class="icon-file-alt"></i></span> Sample Pages
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="blank.html">Blank Page</a></li>
                            <li><a class="" href="sidebar_closed.html">Sidebar Closed Page</a></li>
                            <li><a class="" href="coming_soon.html">Coming Soon</a></li>
                            <li><a class="" href="blog.html">Blog</a></li>
                            <li><a class="" href="about_us.html">About Us</a></li>
                            <li><a class="" href="contact_us.html">Contact Us</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"><i class="icon-glass"></i></span> Extra
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="lock.html">Lock Screen</a></li>
                            <li><a class="" href="profile.html">Profile</a></li>
                            <li><a class="" href="invoice.html">Invoice</a></li>
                            <li><a class="" href="pricing_tables.html">Pricing Tables</a></li>
                            <li><a class="" href="faq.html">FAQ</a></li>
                            <li><a class="" href="404.html">404 Error</a></li>
                            <li><a class="" href="500.html">500 Error</a></li>
                        </ul>
                    </li>
                    <li><a class="" href="login.html"><span class="icon-box"><i class="icon-user"></i></span> Login Page</a></li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN PAGE -->
            <div id="main-content">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                            <h3 class="page-title">
                                Page Title
                                <small>page description</small>
                            </h3>
                            <ul class="breadcrumb">
                                <!-- BREADCRUMB & SEARCH GOES HERE-->
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div id="page">
                        <!-- PAGE CONTENT GOES HERE-->
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle red-color">
                                    <i class="icon-tags"></i>
                                </div>
                                <p>
                                    <strong>+970</strong>
                                    Sales
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->

            <!-- BEGIN FOOTER -->
            <div id="footer">
                2013 &copy; Admin Lab Dashboard.
                <div class="span pull-right">
                    <span class="go-top"><i class="icon-arrow-up"></i></span>
                </div>
            </div>
            <!-- END FOOTER -->

            <!-- BEGIN JAVASCRIPTS -->
            <!-- Load javascripts at bottom, this will reduce page load time -->
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.3.min.js"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.slimscroll.min.js" ></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js" ></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.blockui.js"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.cookie.js"></script>
            <!-- ie8 fixes -->
            <!--            [if lt IE 9]-->
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/excanvas.js"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/respond.js"></script>
            <!--[endif]-->
            <!--common script for all pages-->
            <!--<script src="<?php // echo Yii::app()->theme->baseUrl;   ?>/js/scripts.js"></script>-->
            <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.setMainPage(true);
                App.init();
            });
            </script>

            <!-- END JAVASCRIPTS -->   
            <!--             BEGIN JAVASCRIPTS 
                         Load javascripts at bottom, this will reduce page load time 
                        <script src="js/jquery-1.8.3.min.js"></script>
                        <script src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
                        <script src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
                        <script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
                        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                        <script src="assets/js/jquery.blockui.js"></script>
                        <script src="assets/js/jquery.cookie.js"></script>
                         ie8 fixes 
                        [if lt IE 9]>
                        <script src="js/excanvas.js"></script>
                        <script src="js/respond.js"></script>
                        <![endif]
                        <script src="js/scripts.js"></script>
                        <script>
                                    jQuery(document).ready(function() {
                                        // initiate layout and plugins
                                        App.setMainPage(true);
                                        App.init();
                                    });
                        </script>
                         END JAVASCRIPTS -->


    </body>
    <!-- END BODY -->
</html>