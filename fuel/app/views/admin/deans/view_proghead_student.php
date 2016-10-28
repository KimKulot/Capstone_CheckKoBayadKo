<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Listing of Students</li>
                <?php echo Html::anchor('admin/admins/index', 'course', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>
                </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">
				<?php if ($students): ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Program</th>
						</tr>
					</thead>
					<tbody>
					<?php echo  "The programs you've handled: " ?>
					<?php $course = null; ?>
						<?php foreach ($progheads as $progdean): ?>
							<?php foreach ($programs as $program): ?>
								<?php $course = $program->program_description; ?>
								<?php if ($progdean->program_id == $program->id): ?>
									<?php echo "" . $program->program_description . " / "; ?>
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