<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Listing of Students</li>
               
                </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                <?php $progdean_id = 0; ?>
				<?php if ($students): ?>
					<?php foreach ($progdeans as $progdean): ?>
						<?php $progdean_id = $progdean->user_id; ?>
					<?php endforeach ?>
				
				<table class="table table-striped">
				 <?php echo Html::anchor('admin/deans/create_dean_program/' . $progdean_id, 'Add Program', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Program</th>
						</tr>
					</thead>
					<tbody>
					<?php $course = null; ?>
						<?php foreach ($progdeans as $progdean): ?>
							<?php foreach ($programs as $program): ?>
								<?php $course = $program->program_description; ?>
								<?php if ($progdean->program_id == $program->id): ?>
									<?php echo "<h1>" . $program->program_description . "</h1>"; ?>
								  <?php foreach ($students as $student): ?>
								  	<?php foreach ($users as $user): ?>
								  	<?php if ($user->id == $student->student_id): ?>
								  		<?php if ($program->program_description == $student->program): ?>
											<tr>
												<td><?= $user->firstname . " " . $user->lastname; ?></td>
												<td><?= $program->program_description; ?></td>
											</tr>
										<?php endif; ?>
									 <?php endif ?>
									 <?php endforeach ?>
								   <?php endforeach ?>
								<?php endif ?>
							<?php endforeach ?>
						<?php endforeach ?>
					</tbody>
				</table>

				<?php else: ?>
				<p>No Students.</p>
				<?php endif; ?><!-- <p>
					<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

				</p> -->
					<!-- START DYNAMIC TABS -->
					<div class="container">
					  <h2>Dynamic Tabs</h2>
					  <ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
					    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
					    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
					    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
					  </ul>

					  <div class="tab-content">
					    <div id="home" class="tab-pane fade in active">
					      <h3>HOME</h3>
					      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					    </div>
					    <div id="menu1" class="tab-pane fade">
					      <h3>Menu 1</h3>
					      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					    </div>
					    <div id="menu2" class="tab-pane fade">
					      <h3>Menu 2</h3>
					      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
					    </div>
					    <div id="menu3" class="tab-pane fade">
					      <h3>Menu 3</h3>
					      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
					    </div>
					  </div>
					</div>
					<!-- END DYNAMIC TABS -->
				</div>
            </div>
        </div>
    </section>

