<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href=<?php echo CSS_DIRECTORY_URL . 'bootstrap.min.css'; ?> >
    <link rel="stylesheet" type="text/css" href=<?php echo CSS_DIRECTORY_URL . 'metisMenu.min.css'; ?> >
    <link rel="stylesheet" type="text/css" href=<?php echo CSS_DIRECTORY_URL . 'sb-admin-2.css'; ?> >
    <link rel="stylesheet" type="text/css" href=<?php echo CSS_DIRECTORY_URL . 'font-awesome.min.css'; ?> >
    <link rel="stylesheet" type="text/css" href=<?php echo CSS_DIRECTORY_URL . 'timeline.css'; ?> >
    <link rel="stylesheet" type="text/css" href=<?php echo CSS_DIRECTORY_URL . 'styleAdmin.css'; ?> >
    <link rel="stylesheet" type="text/css" href=<?php echo CSS_DIRECTORY_URL . 'loadingBar.css'; ?> >
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . '/lib/jquery.min.js'; ?> ></script>
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . '/lib/bootstrap.min.js'; ?> ></script>
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . 'metisMenu.min.js'; ?> ></script>
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . 'raphael-min.js'; ?> ></script>
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . 'sb-admin-2.js'; ?> ></script>
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . 'loadingBar.js'; ?> ></script>
    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        	<!-- .navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=<?php echo BASE_URL . 'admin'; ?> >
                    <img src=<?php echo IMG_DIRECTORY_URL . 'campagnes/1/logo.png'; ?> alt="" height="30px" width="60px"> Concours photo Admin
                </a>
            </div>
            <!-- /.navbar-header -->

			<!-- .navbar-static-side -->
            <div class="navbar-default sidebar" role="navigation">
            	<!-- .sidebar-collapse -->
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href=<?php echo BASE_URL . "admin/index/index"; ?>><i class="fa fa-home"></i> Accueil</a>
                        </li>
                        <li>
                            <a href=<?php echo  BASE_URL . 'admin/campagnes/' ?> ><i class="fa fa-trophy"></i> Concours<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href=<?php echo BASE_URL . "admin/campagnes/showCurrent"; ?> ><i class="fa fa-eye"></i> Voir le concours en cours</a>
                                </li>
                                <li>
                                    <a href=<?php echo BASE_URL . "admin/campagnes/show/"; ?> ><i class="fa fa-th-list"></i> Voir la liste<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <?php
                                            $concoursForMenu = campagne::load();
                                            foreach ($concoursForMenu as $concours) {
                                        ?>
                                            <li>
                                                <a href=<?php echo  BASE_URL . 'admin/campagnes/show/' . urlencode($concours->getNomCampagne()); ?> >
                                                    <i class="fa fa-eye"></i> <?php echo $concours->getNomCampagne();?>
                                                </a>
                                            </li>
                                        <?php
                                            } 
                                        ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href=<?php echo BASE_URL . "admin/campagnes/create"; ?> ><i class="fa fa-plus-circle"></i> Créer un nouveau</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			<?php include $this->view; ?>
        </div>

    </div>

</body>
</html>