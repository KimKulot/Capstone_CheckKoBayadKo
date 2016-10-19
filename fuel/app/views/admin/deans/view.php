<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Listing of Deans</li>
                <?php echo Html::anchor('admin/admins/index', 'course', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>
                </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">

				<?php if ($progdeans): ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Full Name</th>
							<!-- <th>Program assigned</th> -->
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
						

						<?php foreach ($progdeans as $deans): ?>
							<?php foreach ($users as $user): ?>
								<?php if ($deans->user_id == $user->id): ?>
									<tr>
										<td><?= $user->firstname . " " . $user->lastname; ?></td>
									<!-- <?php foreach ($programs as $program): ?>
										<?php if ($deans->program_id == $program->id): ?>
											<td><?= $program->program_description; ?></td>
										<?php endif ?>
									<?php endforeach ?> -->
									<td>
									<?php echo Html::anchor('admin/deans/view_progdean_student/'.$user->id, 'View', array('class' => 'btn ink-reaction btn-primary btn-raised btn-sm')); ?>
								
									</tr>
								<?php endif; ?>
							<?php endforeach ?>
						<?php endforeach ?>
						
					
					</tbody>
				</table>

				<?php else: ?>
				<p>No Deans.</p>
				<?php endif; ?><!-- <p>
					<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

				</p> -->
				</div>
            </div>
        </div>
    </section>