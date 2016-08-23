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