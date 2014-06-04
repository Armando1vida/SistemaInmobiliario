<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--><html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8">
        <title> Sistema Inmobiliario</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">
        <!--<link href="<?php // echo Yii::app()->theme->baseUrl;       ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style_responsive.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style_default.css" rel="stylesheet" id="style_color">
        <!--<link href="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet">-->
        <!--<link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/uniform/css/uniform.default.css">-->
        <!--<link href="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet">-->
        <!--<link href="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css">-->

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
                    <!-- BEGIN LOGO -->
                    <!--                    <a class="brand" href="index.html">
                                            <img src="img/logo.png" alt="Admin Lab" />
                                        </a>-->
                    <!-- END LOGO -->

                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="arrow"></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->

                    <div class="top-nav ">
                        <!-- BEGIN TOP NAVIGATION MENU -->
                        <ul class="nav pull-right top-menu" >
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!--<img src="img/avatar1_small.jpg" alt="">-->
                                    <span class="username"><?php echo Yii::app()->user->name ? Yii::app()->user->name : "Guest" ?></span>
<!--                                    <span class="username">Mosaddek Hossain</span>-->
                                    <b class="caret"></b>
                                </a>

                                <ul class="dropdown-menu ">
                                    <?php if (!Yii::app()->user->isGuest): ?>
                                        <li><?php echo CHtml::link('<i class="icon-user"></i>&nbsp;&nbsp;Mi Cuenta', array('/cruge/ui/editprofile')) ?></a></li>
                                        <?php if (Yii::app()->user->checkAccess('admin')): ?>
                                            <li><?php echo CHtml::link('<i class="icon-cog"></i>&nbsp;&nbsp;Administración', Yii::app()->user->ui->userManagementAdminUrl) ?></li>
                                        <?php endif; ?>
                                        <li><?php echo CHtml::link('<i class="icon-key"></i>&nbsp;&nbsp;Cerrar Sesión', Yii::app()->user->ui->logoutUrl) ?></a></li>
                                    <?php else: ?>
                                        <li><?php echo CHtml::link('<i class="icon-key"></i>&nbsp;&nbsp;Iniciar Sesión', Yii::app()->user->ui->loginUrl) ?></a></li>
                                    <?php endif; ?>
                                </ul>


                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->


        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div id="sidebar" class="nav-collapse collapse">
                <!--BEGIN SIDEBAR TOGGLER BUTTON--> 
                <div class="sidebar-toggler hidden-phone"></div>
                <!--BEGIN SIDEBAR TOGGLER BUTTON--> 

                <!-- BEGIN SIDEBAR MENU -->
                <?php
                $this->widget('zii.widgets.CMenu', array(
//                    'items' => Menu::getMenu($this),
                    'items' => $this->admin ? Menu::getAdminMenu($this) : Menu::getMenu($this),
                    'encodeLabel' => false,
                    'itemCssClass' => 'has-sub',
                    'activeCssClass' => 'active',
                    'htmlOptions' => array('class' => 'sidebar-menu'),
                    'submenuHtmlOptions' => array('class' => 'sub')
                ));
                ?>
                <!-- END SIDEBAR MENU -->

            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->
            <div id="main-content">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row-fluid">
                        <?php echo $content; ?>
                    </div>
                    <!-- END PAGE CONTENT--> 
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div id="footer">
            <?php // echo date();?>  2014 &copy; UTN
            <div class="span pull-right">
                <span class="go-top"><i class="icon-arrow-up"></i></span>
            </div>
        </div>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;       ?>/js/jquery-1.8.3.min.js"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>-->
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;       ?>/assets/bootstrap/js/bootstrap.min.js"></script>-->
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/js/jquery.blockui.js"></script>-->
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/js/jquery.cookie.js"></script>-->
        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="js/excanvas.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->
<!--        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/jquery-knob/js/jquery.knob.js"></script>
<!--        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/flot/jquery.flot.js"></script>
        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/flot/jquery.flot.resize.js"></script>

        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/flot/jquery.flot.pie.js"></script>
        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/flot/jquery.flot.stack.js"></script>
        <script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/flot/jquery.flot.crosshair.js"></script>-->

        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;    ?>/js/jquery.peity.min.js"></script>-->
        <!--<script type="text/javascript" src="<?php // echo Yii::app()->theme->baseUrl;    ?>/assets/uniform/jquery.uniform.min.js"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.setMainPage(false);
                App.init();
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>