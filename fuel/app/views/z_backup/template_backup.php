<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title><?php echo $title; ?></title>
	<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
	<?php echo Asset::css('theme-default/bootstrap.css'); ?>
	<?php echo Asset::css('theme-default/materialadmin.css'); ?>
	<?php echo Asset::css('theme-default/font-awesome.min.css'); ?>
	<?php echo Asset::css('theme-default/material-design-iconic-font.min.css'); ?>
	<?php echo Asset::css('jquery.datetimepicker.css') ?>
   	<?php echo Asset::css('plugins.css'); ?>
	<?php echo Asset::css('bootstrap.min.css'); ?>
	<!-- <?php //echo Asset::css('business-casual.css'); ?> -->
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 50px; }
	</style>

	<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js',
		'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
		'jquery.datetimepicker.full.js'
	)); ?>
	
</head>
<body  class="menubar-hoverable header-fixed menubar-pin" >

	<?php if ($current_user): ?>
<!-- trydaw -->


<!-- BEGIN HEADER-->
<div class="nav navbar-fixed-top">
<header id="header" >
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand" >
                    <div class="brand-holder">
                        <a href="#">
                        	<?php echo Html::anchor('admin', '<span class="text-lg text-bold text-primary">CheckKoBayadKo</span>') ?>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">
                <li>
                    <!-- Search form -->
                    <form class="navbar-search" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                        </div>
                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                    </form>
                </li>
               
                
            </ul><!--end .header-nav-options -->
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                    	<?php echo Asset::img('default_icon.png') ?>
                     	<?php echo " " . $current_user->username?> 		
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li> <?php echo Html::anchor('admin/logout', '<i class="fa fa-fw fa-power-off text-danger"></i> Logout') ?></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->

        </div><!--end #header-navbar-collapse -->
    </div>
    </div>
</header>
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->

    <?php //$this->load->view($v); ?>





























<!-- end try -->

<!-- begin footer try -->





<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        
    </div>
    <div class="menubar-scroll-panel">

       
        <ul id="main-menu" class="gui-controls">
					<!-- <li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
						<?php echo Html::anchor('admin', 'Home') ?>
					</li> -->

					<?php
						$files = new GlobIterator(APPPATH.'classes/controller/admin/*.php');
						
						foreach($files as $file)
						{
							$section_segment = $file->getBasename('.php');
							
							//START SUPER ADMIN -->
							if($current_user->role == 10):
									$section_title = Inflector::humanize($section_segment); 
									?>
									<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
									
										<?php echo Html::anchor('admin/'.$section_segment, '<div class="gui-icon"><i class="fa fa-user"></i></div> <span class="title">'.$section_title) . '</span>'?>
									</li>
							<?php endif ?>
							<!--END SUPER ADMIN -->
							<?php
							//START VPAAS -->
							if($current_user->role == 7):
								if ($section_segment == "vpaas"): 
									$section_title = Inflector::humanize($section_segment); 
									?>
									<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('admin/'.$section_segment, '<div class="gui-icon"><i class="md md-web"></i></div> <span class="title">'. $section_title). '</span>'?>
									</li>
								<?php endif ?>
							<?php endif ?>
							<!--END VPAAS -->


							<?php
							//START ADMIN -->
							if($current_user->role == 6):
								if ($section_segment == "admins"): 
									$section_title = Inflector::humanize($section_segment); 
									?>
									<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
									
									<?php echo Html::anchor('admin/'.$section_segment, $section_title)?>
									</li>
								<?php endif ?>
							<?php endif ?>
							<!--END ADMIN -->


							<?php
							//START PRINCIPAL -->
							if($current_user->role == 5):
								if ($section_segment == "principals"): 
									$section_title = Inflector::humanize($section_segment); 
									?>
									<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('admin/'.$section_segment, $section_title)?>
									</li>
								<?php endif ?>
							<?php endif ?>
							<!--END PRINCIPAL -->

							<?php
							//START CASHIERS -->
							if($current_user->role == 4):
								if ($section_segment == "cashiers"): 
									$section_title = Inflector::humanize($section_segment); 
									?>
									<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('admin/'.$section_segment, $section_title)?>
									</li>
								<?php endif ?>
							<?php endif ?>
							<!--END CASHIERS -->


							<?php 
							//START DEAN / PROGRAM -->
							if($current_user->role == 1 || $current_user->role == 2):
								if ($section_segment == "deans" ): 
									$section_title = Inflector::humanize($section_segment); 
									?>
									<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('admin/'.$section_segment, $section_title)?>
									</li>
								<?php endif ?>
							<?php endif ?>
							<!--END DEAN / PROGRAM -->



							<?php
							//START ACCOUNTANT
							if($current_user->role == 3):
								if ($section_segment == "accountants" || $section_segment == "users" || $section_segment == "students" ): 
									$section_title = Inflector::humanize($section_segment); 
									?>
									<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('admin/'.$section_segment, $section_title)?>
									</li>
								<?php endif ?>
							<?php endif ?>
							<!--END ACCOUNTANT -->
							<?php
						}
					?>
				</ul>
    </div>
</div>
<!-- END BASE -->















<!-- END FOOTER TRY -->












	

	<?php endif; ?>
	<div class="box">
	<div class="container">
		
		  <div class="row">
			<div class="col-md-12">
				<!-- <h1><?php echo $title; ?></h1> -->
				<hr>
<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
<?php endif; ?>
			</div>
			
			<div class="col-md-12">
				<?php echo $content; ?>
			</div>
			</div>
		
		<hr/>
		</div>
		<!-- <footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer> -->
	</div>
    <!-- START SIGNUP BOX -->
   
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; CheckKoBayadKo 2016</p>
                </div>
            </div>
        </div>
    </footer>

<?php echo Asset::js(array(
		'libs/jquery/jquery-1.11.2.min.js',
		'libs/jquery/jquery-migrate-1.2.1.min.js',
		'libs/bootstrap/bootstrap.min.js',
		'libs/spin.js/spin.min.js',
		'libs/autosize/jquery.autosize.min.js',
		'libs/nanoscroller/jquery.nanoscroller.min.js',
		'core/source/App.js',
		'core/source/AppNavigation.js',
		'core/source/AppOffcanvas.js',
		'libs/autosize/jquery.autosize.min.js',
		'core/source/AppCard.js',
		'core/source/AppForm.js',
		'core/source/AppNavSearch.js',
		'core/source/AppVendor.js',
		'core/demo/Demo.js',
	)); ?>
</body>
</html>
