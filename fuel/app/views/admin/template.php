<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title><?php echo $title; ?></title>
	<link href='http://fonts.googleapis.com/ css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
	<?php echo Asset::css('theme-default/bootstrap.css'); ?>
	<?php echo Asset::css('theme-default/materialadmin.css'); ?>
	<?php echo Asset::css('theme-default/font-awesome.min.css'); ?>
	<?php echo Asset::css('theme-default/material-design-iconic-font.min.css'); ?>
	<?php echo Asset::css('theme-default/libs/morris/morris.core.css'); ?>
	<?php echo Asset::css('theme-default/libs/rickshaw/rickshaw.css'); ?>
	<?php echo Asset::css('jquery.datetimepicker.css') ?>
   	<?php echo Asset::css('plugins.css'); ?>
	<!-- <?php //echo Asset::css('business-casual.css'); ?> -->
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	
	<!-- <style>
		body { margin: 50px; }
	</style>
 -->
	<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js',
		'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
		'jquery.datetimepicker.full.js'
	)); ?>
	
</head>
<body  class="menubar-hoverable header-fixed menubar-pin">

	<?php if ($current_user): ?>
<!-- trydaw -->


<!-- BEGIN HEADER-->
<div class="nav navbar-fixed-top">
<header id="header" >
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand">
                    <div class="brand-holder">
                        <a href="#">
                        	<?php echo Asset::img('logs.jpg');?>
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
            <!-- <ul class="header-nav header-nav-options">
                <li>
                    <!-- Search form -->
                    <!-- <form class="navbar-search" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                        </div>
                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                    </form>
                </li> -->
               
                
<!--             </ul> --><!--end .header-nav-options --> 

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i> My Profile</a>
                    </li>
                    <li>
                       <?php echo Html::anchor('admin/logout', '<i class="fa fa-fw fa-power-off text-danger"></i> Logout') ?>
                    </li>
                </ul>
            </div>

            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                    <?php if ($current_user->image == null){ ?>
                        <?php echo Asset::img('default_icon.png') ?>
                    <?php }else{ ?>
                      
                      <?php echo Asset::img('uploads/'. $current_user->image); 
                      }?>
                    	
                     	<?php echo " " . $current_user->firstname . " " . $current_user->lastname;?> 		
                    </a>
                    <ul class="dropdown-menu animation-dock">
                    	 <li>
                             <?php echo Html::anchor('admin/upload_image/' . $current_user->id, '<i class="fa fa-user"></i> Update Profile') ?>
                          </li>
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
							if($current_user->role == 10 || $current_user->role == 6):
								// BEGIN DEAN
								if ($section_segment == "deans" ): 
									$section_title = "Dean / Program head"; 
									?>
									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('#','<div class="gui-icon"><i class="fa fa-user"></i></div> <span class="title">'.   $section_title). '</span>'?>
										<ul>
											
											<li><?php echo Html::anchor('admin/deans/view', '<span class="title">' . 'Deans' . '</span>'); ?>
											</li>
											<li><?php echo Html::anchor('admin/deans/view_proghead', '<span class="title">' . 'Program Heads' . '</span>'); ?>
											</li>
										</ul>
									</li>
									
								<?php endif ?>
								<!-- END DEAN -->


								<!-- BEGIN ACCOUNTANT -->
								<?php
								if($section_segment == "accountants"){
										$section_title = "Accountant"; 
									?>
									<li class="gui-folder  <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('#','<div class="gui-icon"><i class="md md-my-library-books"></i></div> <span class="title">'.  $section_title). '</span>'?>
										<ul>
											<li> <?php echo Html::anchor('admin/'.$section_segment, '<span class="title">Statistical Report</span> '); ?>
											</li>

											<li> <?php echo Html::anchor('admin/accountants/index_student', '<span class="title">Basic Education Statistical Report</span> '); ?>
											</li>

											<li> <?php echo Html::anchor('admin/accountants/index_scholarship', '<span class="title">Scholarship</span> '); ?>
											</li>
										</ul>
									</li>
									<?php
									}elseif($section_segment == "students"){
										$section_title = "Students";
									?>
									<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('admin/'.$section_segment,'<div class="gui-icon"><i class="md md-people"></i></div> <span class="title">'.  $section_title). '</span>'?>
									</li>
									<?php
									}elseif($section_segment == "users"){
										$section_title = "Users";
									?>
									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('#','<div class="gui-icon"><i class="fa fa-users"></i></div> <span class="title">'.  $section_title). '</span>'?>
										<ul>
											<li> <?php echo Html::anchor('admin/'.$section_segment, '<span class="title">Users List</span> '); ?>
											</li>
											<?php if ($current_user->role != 6): ?>
												<li> <?php echo Html::anchor('admin/users/setcron', '<span class="title">Setting Exam Schedule</span> '); ?>
												</li>
												<li> <?php echo Html::anchor('admin/users/basicsetcron', '<span class="title">Setting Exam for Basic Education</span> '); ?>
												</li>

												<li><?php echo Html::anchor('admin/users/create_student', '<span class="title">Add College Student</span>'); ?>
												</li>

												<li><?php echo Html::anchor('admin/users/create_basic_student', '<span class="title">Add Basic Education Student</span>'); ?>
												</li>

												<li><?php echo Html::anchor('admin/users/create', '<span class="title">Add Official User</span>'); ?>
												</li>

												<li><?php echo Html::anchor('admin/users/create_program', '<span class="title">College Program</span>'); ?>
												</li>

												<li><?php echo Html::anchor('admin/users/create_dean', '<span class="title">Add Dean</span>'); ?>
												</li>

												<li> <?php echo Html::anchor('admin/users/create_proghead', '<span class="title">Add Program Head </span> '); ?>
												</li>

												<li> <?php echo Html::anchor('admin/users/graveyard', '<span class="title">Deactivated Users</span> '); ?>
												</li>
											<?php endif; ?>

											
											
										</ul><!--end /submenu -->
									</li>
									<?php
									}
									?>

								<!-- END ACCOUNTANT -->

								<!-- BEGIN CASHIER -->
								<?php
								if ($section_segment == "cashiers"): 
									$section_title = "Cashier"; 
									?>
									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('#', '<div class="gui-icon"><i class="md md-attach-money"></i></div> <span class="title">'.  $section_title). '</span>'?>
										<ul>
											<li> <?php echo Html::anchor('admin/'.$section_segment, '<span class="title">Cashier Encode</span> '); ?>
											</li>
											
											<li> <?php echo Html::anchor('admin/cashiers/index_miscellanous', '<span class="title">Miscellaneous</span> '); ?>
											</li>

											<li> <?php echo Html::anchor('admin/cashiers/index_basic_miscellanous', '<span class="title">Basic Program Miscellaneous</span> '); ?>
											</li>
											<?php if ($current_user->role != 6): ?>
												<li> <?php echo Html::anchor('admin/cashiers/add_miscellanous', '<span class="title">New Miscellaneous (Program)</span> '); ?>
												</li>

												<li> <?php echo Html::anchor('admin/cashiers/add_basic_miscellanous', '<span class="title">New Miscellaneous (Basic Program)</span> '); ?>
												</li>
											<?php endif; ?>
											
										</ul>
									</li>
								<?php endif ?>
								<!-- END CASHIER -->


								<!-- BEGIN PRINCIPAL -->
								<?php 
								if ($section_segment == "principals"): 
									$section_title = "Principal"; 
									?>
									
									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('#','<div class="gui-icon"><i class="md md-person"></i></div> <span class="title">'.  $section_title). '</span>'?>

										<ul>
											<li> <?php echo Html::anchor('admin/'.$section_segment, '<span class="title">Statistical Report</span> '); ?>
											</li>
										</ul>

									</li>
								<?php endif ?>
								<!-- END PRINCIPAL -->

								<!-- BEGIN ADMINS -->
								<?php
								if ($section_segment == "admins"): 
									$section_title = "School Administrator"; 
									?>
									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
									
									<?php echo Html::anchor('#','<div class="gui-icon"><i class="md md-account-box"></i></div> <span class="title">'. $section_title). '</span>'?>
										<ul>
											<li> <?php echo Html::anchor('admin/'.$section_segment, '<span class="title">College Statistical Report</span> '); ?>
											</li>

											<li> <?php echo Html::anchor('admin/admins/basic_index', '<span class="title">Basic Education Statistical Report</span> '); ?>
											</li>
											
										</ul>
									</li>
								<?php endif ?>
								<!-- END ADMINS -->

								<!-- BEGIN VPAA -->
								<?php
								if ($section_segment == "vpaas"): 
									$section_title = "VPAA"; 
									?>

									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
			
										<?php echo Html::anchor('#', '<div class="gui-icon"><i class="fa fa-user"></i></div> <span class=	"title">'. $section_title). '</span>'?>
										<ul>
											<li> <?php echo Html::anchor('admin/'.$section_segment, '<span class="title">College Statistical Report</span> '); ?>
											</li>

											<li> <?php echo Html::anchor('admin/vpaas/basic_index', '<span class="title">Basic Education Statistical Report</span> '); ?>
											</li>
										
										</ul>
									</li>

								<?php endif ?>
								<!-- END VPAA -->
							<?php endif ?>
							<!--END SUPER ADMIN -->

							








							<?php
							//START VPAAS -->
							if($current_user->role == 7):
								if ($section_segment == "vpaas"): 
									$section_title = "VPAA"; 
									?>
									<li class="?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                        <?php echo Html::anchor('admin','<span class="gui-icon"><i class="fa fa-home (alias)"></i></span> <span class="title">'.   "Home"). '</span>'?>
                                    </li>
									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
			
										<?php echo Html::anchor('#', '<div class="gui-icon"><i class="fa fa-user"></i></div> <span class="title">'. $section_title). '</span>'?>
										<ul>
											<li> <?php echo Html::anchor('admin/'.$section_segment, '<span class="title">College Statistical Report</span> '); ?>
											</li>

											<!-- <li> <?php echo Html::anchor('admin/vpaas/basic_index', '<span class="title">Basic Education Statistical Report</span> '); ?>
											</li> -->
										
										</ul>

									</li>
								<?php endif ?>
							<?php endif ?>
							<!--END VPAAS -->


							 <?php
							// //START ADMIN -->
							// if($current_user->role == 6):
							// 	if ($section_segment == "admins"): 
							// 		$section_title = "School Administrator"; 
							// 		?>
							<!-- <li class="<?php //echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
									
							 		<?php //echo Html::anchor('admin/'.$section_segment,'<div class="gui-icon"><i class="md md-web"></i></div> <span class="title">'. $section_title). '</span>'?>
								<!--</li> -->
							 	<?php //endif ?>
							 <?php //endif ?>
							 <!--END ADMIN -->


							<?php
							//START PRINCIPAL -->
							if($current_user->role == 5):
								if ($section_segment == "principals"): 
									$section_title = "Principal"; 
									?>
									<li class="?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                        <?php echo Html::anchor('admin','<span class="gui-icon"><i class="fa fa-home (alias)"></i></span> <span class="title">'.   "Home"). '</span>'?>
                                    </li>
									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('admin/'.$section_segment,'<div class="gui-icon"><i class="md md-person"></i></div> <span class="title">'.  $section_title). '</span>'?>
										<ul>
											<li> <?php echo Html::anchor('admin/'.$section_segment, '<span class="title">Statistical Report</span> '); ?>
											</li>
										</ul>
									</li>
								<?php endif ?>
							<?php endif ?>
							<!--END PRINCIPAL -->

							<?php
							//START CASHIERS -->
							if($current_user->role == 4):
								if ($section_segment == "cashiers"): 
									$section_title = "Cashier"; 
									?>
									<li class="?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                        <?php echo Html::anchor('admin','<span class="gui-icon"><i class="fa fa-home (alias)"></i></span> <span class="title">'.   "Home"). '</span>'?>
                                    </li>
									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('#', '<div class="gui-icon"><i class="md md-attach-money"></i></div> <span class="title">'.  $section_title). '</span>'?>
										<ul>
											<li> <?php echo Html::anchor('admin/'.$section_segment, '<span class="title">Cashier Encode</span> '); ?>
											</li>
											
											<li> <?php echo Html::anchor('admin/cashiers/index_miscellanous', '<span class="title">Miscellaneous</span> '); ?>
											</li>

											<li> <?php echo Html::anchor('admin/cashiers/index_basic_miscellanous', '<span class="title">Basic Program Miscellaneous</span> '); ?>
											</li>

											<li> <?php echo Html::anchor('admin/cashiers/add_miscellanous', '<span class="title">New Miscellaneous (Program)</span> '); ?>
											</li>

											<li> <?php echo Html::anchor('admin/cashiers/add_basic_miscellanous', '<span class="title">New Miscellaneous (Basic Program)</span> '); ?>
											</li>
											
										</ul>
									</li>
								<?php endif ?>
							<?php endif ?>
							<!--END CASHIERS -->


							<?php 
							//START DEAN -->
							if($current_user->role == 1):
								if ($section_segment == "deans" ): 
									$section_title = "Dean"; 
									?>
									<li class=" gui-folder  <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('#','<div class="gui-icon"><i class="fa fa-user"></i></div> <span class="title">'.   $section_title). '</span>'?>
										<ul>
											<li>
												<?php echo Html::anchor('admin/'.$section_segment, '<span class="title">Listing of Students</span> '); ?>
											</li>
											<!-- <li> <?php echo Html::anchor('admin/accountants/index_scholarship', '<span class="title">Scholarship</span> '); ?>
											</li> -->
										</ul>
									</li>
								<?php endif ?>
							<?php endif ?>
							<!--END DEAN / PROGRAM -->

							<?php 
							//START DEAN / PROGRAM -->
							if($current_user->role == 2):
								if ($section_segment == "heads" ): 
									$section_title = "Program Head"; 
									?>
									<li class=" gui-folder  <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('#','<div class="gui-icon"><i class="fa fa-user"></i></div> <span class="title">'.   $section_title). '</span>'?>
										<ul>
											<li>
												<?php echo Html::anchor('admin/'.$section_segment, '<span class="title">Listing of Students</span> '); ?>
											</li>
											<!-- <li> <?php echo Html::anchor('admin/accountants/index_scholarship', '<span class="title">Scholarship</span> '); ?>
											</li> -->
										</ul>
									</li>
								<?php endif ?>
							<?php endif ?>
							<!--END DEAN / PROGRAM -->





							<?php
							//START ACCOUNTANT
							if($current_user->role == 3):
								
									if($section_segment == "accountants"){
										$section_title = "Accountant"; 
									?>
									<li class="?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                        <?php echo Html::anchor('admin','<span class="gui-icon"><i class="fa fa-home (alias)"></i></span> <span class="title">'.   "Home"). '</span>'?>
                                    </li>

									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('#','<div class="gui-icon"><i class="md md-web"></i></div> <span class="title">'.  $section_title). '</span>'?>
										<ul>
											<li> <?php echo Html::anchor('admin/'.$section_segment, '<span class="title">College Statistical Report</span> '); ?>
											</li>

											<li> <?php echo Html::anchor('admin/accountants/index_student', '<span class="title">Basic Education Statistical Report</span> '); ?>
											</li>

											<li> <?php echo Html::anchor('admin/accountants/index_scholarship', '<span class="title">Scholarship</span> '); ?>
											</li>

										</ul>
									</li>
									<?php
									}elseif($section_segment == "students"){
										$section_title = "Students";
									?>
									<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('admin/'.$section_segment,'<div class="gui-icon"><i class="md md-perm-contact-cal"></i></div> <span class="title">'.  $section_title). '</span>'?>
									</li>
									<?php
									}elseif($section_segment == "deans" ){

									$section_title = "Dean / Program head"; 
									?>
									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('#','<div class="gui-icon"><i class="fa fa-user"></i></div> <span class="title">'.   $section_title). '</span>'?>
										<ul>
											<!-- <li><?php echo Html::anchor('admin/'.$section_segment, '<span class="title">' . 'Users List' . '</span>'); ?>
											</li> -->
											<li><?php echo Html::anchor('admin/deans/view', '<span class="title">' . 'Deans' . '</span>'); ?>
											</li>
											<li><?php echo Html::anchor('admin/deans/view_proghead', '<span class="title">' . 'Program Heads' . '</span>'); ?>
											</li>
										</ul>
									</li>
									<?php
									}elseif($section_segment == "users"){
										$section_title = "Users";
									?>
									<li class="gui-folder <?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('#','<div class="gui-icon"><i class="fa fa-users"></i></div> <span class="title">'.  $section_title). '</span>'?>
										<ul>
											<li> <?php echo Html::anchor('admin/'.$section_segment, '<span class="title">Users List</span> '); ?>
											</li>
											<li> <?php echo Html::anchor('admin/users/setcron', '<span class="title">Setting Exam Schedule</span> '); ?>
											</li>
											<li> <?php echo Html::anchor('admin/users/basicsetcron', '<span class="title">Setting Exam for Basic Education</span> '); ?>
											</li>

											<li><?php echo Html::anchor('admin/users/create_student', '<span class="title">Add College Student</span>'); ?>
											</li>

											<li><?php echo Html::anchor('admin/users/create_basic_student', '<span class="title">Add Basic Education Student</span>'); ?>
											</li>

											<li><?php echo Html::anchor('admin/users/create', '<span class="title">Add Official User</span>'); ?>
											</li>

											<li><?php echo Html::anchor('admin/users/create_program', '<span class="title">College Program</span>'); ?>
											</li>

											<li><?php echo Html::anchor('admin/users/create_dean', '<span class="title">Add Dean</span>'); ?>
											</li>

											<li> <?php echo Html::anchor('admin/users/create_proghead', '<span class="title">Add Program Head </span> '); ?>
											</li>

											<li> <?php echo Html::anchor('admin/users/graveyard', '<span class="title">Deactivated Users</span> '); ?>
											</li>
											
										</ul><!--end /submenu -->
									</li>
									<?php
									}
									?>

									
								
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

<div class="page-icon animated bounceInDown">
	<?php if (Session::get_flash('success')): ?>
		<br>
		<br>
		<br>
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
		<br>
		<br>
		<br>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>
						<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
						</p>
					
	<?php endif; ?>
</div>
			
			<div class="col-md-12">
				<?php echo $content; ?>
			
		<!-- <footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer> -->
	
    <!-- START SIGNUP BOX -->
   
	<!-- <footer class=" navbar-fixed-bottom navbar-default" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <span class="title">Copyright &copy; CheckKoBayadKo 2016</span>
                </div>
            </div>
        </div>
    </footer> -->
<script>
 var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Password Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

<?php echo Asset::js(array(
		'libs/jquery/jquery-1.11.2.min.js',
		'libs/jquery/jquery-migrate-1.2.1.min.js',
		// 'libs/bootstrap/bootstrap.min.js',
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
		'libs/moment/moment.min.js',
		'libs/flot/jquery.flot.min.js',
		'libs/flot/jquery.flot.time.min.js',
		'libs/flot/jquery.flot.resize.min.js',
		'libs/flot/jquery.flot.orderBars.js',
		'libs/flot/jquery.flot.pie.js',
		'libs/flot/curvedLines.js',
		'libs/jquery-knob/jquery.knob.min.js',
		'libs/sparkline/jquery.sparkline.min.js',
		'libs/raphael/raphael-min.js',
		'libs/morris.js/morris.min.js',
		'libs/d3/d3.min.js',
		'libs/d3/d3.v3.js',
		'libs/rickshaw/rickshaw.min.js',
		'core/demo/DemoCharts.js',
	)); ?>
		
</body>
</html>
