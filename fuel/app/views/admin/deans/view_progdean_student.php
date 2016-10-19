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
				</div>
            </div>
        </div>
    </section>