<!DOCTYPE html>
<html lang="en">
<head><!-- 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- ********************************************************* -->
            <meta charset="UTF-8">

       
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">


    


        <?php echo Asset::css('assets2/bootstrap/css/bootstrap.min.css'); ?>
        <?php echo Asset::css('assets2/font-awesome/css/font-awesome.min.css'); ?>
        <?php echo Asset::css('assets2/css/form-elements.css'); ?>
         


        <!-- Vendor CSS -->
        
        <?php echo Asset::css('assets/vendor/bootstrap-datepicker/css/datepicker3.css'); ?>
        <?php echo Asset::css('assets/vendor/font-awesome/css/font-awesome.css'); ?>
        <?php echo Asset::css('assets/vendor/magnific-popup/magnific-popup.css'); ?>
        <?php echo Asset::css('assets/vendor/bootstrap/css/bootstrap.css'); ?>

        <!-- Theme CSS -->
        <?php echo Asset::css('assets/stylesheets/theme.css'); ?>

        <!-- Skin CSS -->
        <?php echo Asset::css('assets/stylesheets/skins/default.css'); ?>  

        <!-- Theme Custom CSS -->
        <?php echo Asset::css('assets/stylesheets/theme-custom.css'); ?>

        <!-- Head Libs -->
      


    <!-- ********************************************************* -->

	<title><?php echo $title; ?></title>
	

	
  </head>
<body>


	<?php if ($current_user): ?>
<!-- trydaw -->
            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="#" class="logo">
                     <figure class="profile-picture">
                       <!-- <?php echo Asset::img('logs.jpg') ?>  -->
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
            
                <!-- start: search & user box -->
                <div class="header-right">
            
                    <!-- <form action="#" class="search nav-form">
                        <div class="input-group input-search">
                            <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form> -->
            
                    <span class="separator"></span>
            
                    <span class="separator"></span>
            
                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                            <?php if ($current_user->image == null){ ?>
                                <?php echo Asset::img('default_icon.png') ?>
                            <?php }else{ ?>
                              
                              <?php echo Asset::img('uploads/'. $current_user->image); 
                              }?>
                                <!-- <img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" /> -->
                            </figure>
                            <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                                <span class="name"><?= $current_user->lastname . ", " .$current_user->firstname;?></span>
                                <!-- <span class="role">Parent</span> -->
                            </div>
            
                            <i class="fa custom-caret"></i>
                        </a>
            
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <!-- <a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i> My Profile</a> -->
                                    <?php echo Html::anchor('site/upload_image/' . $current_user->id, '<i class="fa fa-user"></i> Update Profile') ?>
                                </li>
                                <li>
                                   <?php echo Html::anchor('admin/logout', '<i class="fa fa-fw fa-power-off text-danger"></i> Logout') ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->


<div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">
                
                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Navigation
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>
                
                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                <ul class="nav nav-main">
                                    <!-- <li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
                                        <?php echo Html::anchor('admin/', '<div class="gui-icon"><i class="fa fa-user"></i></div> <span class="title">Home</span>') ?> 
                                    </li>  -->
                                    <?php
                                        $files = new GlobIterator(APPPATH.'classes/controller/*.php');

                                        foreach($files as $file)
                                        {
                                            $section_segment = $file->getBasename('.php');
                                            $section_title = Inflector::humanize($section_segment);
                                            ?>
                                            <!-- );die; ?> -->
                                            <!-- <?php var_dump($section_segment) ?> -->
                                            <!-- ======================================================================== -->
                                           <!--  //START SUPER ADMIN -->

                                           <?php 
                                            if($current_user->role == 8):

                                                // BEGIN DEAN
                                                if ($section_segment == "site" ): 
                                                    $section_title = "Assessment"; 
                                                    ?>
                                                    <li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                                        <?php echo Html::anchor('site/home','<span class="gui-icon"><i class="fa fa-home (alias)"></i></span> <span class="title">'.   "Home"). '</span>'?>
                                                    </li>

                                                    <li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                                        <?php echo Html::anchor('site','<span class="gui-icon"><i class="fa fa-dedent (alias)"></i></span> <span class="title">'.   $section_title). '</span>'?>
                                                    </li>
                                                    
                                                <?php endif ?>
                                                <!-- END DEAN -->
                                            <?php endif ?>
                                            <!--  //END SUPER ADMIN -->
                                            <!-- ==========================================================================-->

                                            <?php 
                                            if($current_user->role == 9):

                                                // BEGIN DEAN
                                                if ($section_segment == "site" ): 
                                                    $section_title = "Assessment"; 
                                                    ?>
                                                    <li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                                        <?php echo Html::anchor('site/home','<span class="gui-icon"><i class="fa fa-home (alias)"></i></span> <span class="title">'.   "Home"). '</span>'?>
                                                    </li>

                                                    <li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                                        <?php echo Html::anchor('site/index_parent','<span class="gui-icon"><i class="fa fa-dedent (alias)"></i></span> <span class="title">'.   $section_title). '</span>'?>
                                                    </li>
                                                    
                                                <?php endif ?>
                                                <!-- END DEAN -->
                                            <?php endif ?>
                                            <!--  //END SUPER ADMIN -->



                                            <!-- ======================================================================== -->

                                            <!-- <li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                                <?php echo Html::anchor('admin/'.$section_segment,'<div class="gui-icon"><i class="fa fa-user"></i></div> <span class="title">'. $section_title) . '</span>' ?>
                                            </li>
                                                    -->     
                                            <!-- ==========================================================================-->

                                            <?php
                                        }
                                    ?>
                                </ul>
                            </nav>
                    </div>
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2><?= $current_user->lastname . ", " .$current_user->firstname . " " . $current_user->middlename; ?></h2>
                    </header>
                <?php endif; ?>
                <div class="page-icon animated bounceInDown">
                    <?php if (Session::get_flash('success')): ?>
                                    <div class="alert alert-success alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <p>
                                        <?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
                                        </p>
                                    </div>
                    <?php endif; ?>
                </div>
                <div class="page-icon animated bounceInDown">
                    <?php if (Session::get_flash('error')): ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <p>
                                        <?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
                                        </p>
                                    </div>
                    <?php endif; ?>
                </div>

            
                    <!-- start: page -->
                     <?php echo $content; ?>
                    <!-- end: page -->
        </section>

        <!-- Vendor <-->
<!-- Javascript -->

 <?php echo Asset::js(array(
            "jquery-1.11.1.min.js",
            "modernizr.js",
            "jquery/jquery.js",
            "jquery-browser-mobile/jquery.browser.mobile.js",
            "bootstrap.js",
            "nanoscroller.js",
            "bootstrap-datepicker.js",
            "magnific-popup.js",
            "jquery.placeholder.js",
            "theme.js",
            "theme.custom.js",
            "theme.init.js",
            "jquery.backstretch.min.js",
        )); 
        ?>
        

</body>
</html>

       
