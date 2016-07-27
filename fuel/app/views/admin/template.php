<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title><?php echo $title; ?></title>
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
<body class="login fade-in" data-page="login">
	<?php if ($current_user): ?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">CheckKoBayadKo</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
						<?php echo Html::anchor('admin', 'Home') ?>
					</li>

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
										<?php echo Html::anchor('admin/'.$section_segment, $section_title)?>
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
										<?php echo Html::anchor('admin/'.$section_segment, $section_title)?>
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
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-user"></span><?php echo " " . $current_user->username?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

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


</body>
</html>
