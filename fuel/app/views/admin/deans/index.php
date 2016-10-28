<?php 
		if ($current_user->role != 1 && $current_user->role != 10 && $current_user->role != 6) {
			Response::redirect('/');
		}
 ?>
 <div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">List of Students </li>
                <!-- <?php echo Html::anchor('admin/cashiers/add_miscellanous', '<span class="glyphicon glyphicon-plus "></span>Add Program', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?> -->
                <li class="active"><?php echo $current_user->lastname . ", " . $current_user->firstname . " " . $current_user->middlename; ?></li>
                </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                <?php echo "Program(s) you handle: "; ?>
				<?php foreach ($progdeans as $progdean): ?>
					<?php foreach ($programs as $program): ?>
						<?php $course = $program->program_description; ?>
						<?php if ($progdean->program_id == $program->id): ?>
							<?php echo "" . $program->program_description . " / "; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endforeach; ?>

				 
				<?php if ($students): ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Program</th>
							<th>Year Level</th>
							<th>Total Assesment</th>
							<th>Tuition Fee</th>
							<th>Misc</th>
							<th>Total Payment</th>
							<!-- <th>Amount per exam</th> -->
							<th>Tuition Discount</th>
							<th>Miscellaneous Discount</th>
							<th>Balance</th>
							<th></th>
						</tr>
					</thead>
					<tbody>	
				<?php $count = 0; ?>
				
				<?php foreach ($progdeans as $progdean): ?>
					<?php if ($current_user->id == $progdean->user_id): ?>
							<?php foreach ($students as $item): ?>
								<?php 
									$boolchecker = true;
									$check = 1;
								?>

								<?php foreach ($programs as $program): ?>
									<?php if ($program->id == $progdean->program_id): ?>
										<!-- <?php echo "" . $program->program_description . " / "; ?> -->
										<?php if ($item->program == $program->program_description): ?>

											<tr>
												<?php foreach ($users as $key): ?>
													<?php if($item->student_id == $key->id){ ?>
														<td><?php echo $key->lastname . ', ' . $key->firstname . ' ' . $key->middlename . "." ?></td> 
													
												<?php
													$check = 0;
													 }
													if ($check != 1) {
													 	$boolchecker = false;
													 } 
												?>
												<?php endforeach ?>
												
												<?php if ($count == 0): ?>
													<?php 
														// echo $item->program;
														$count++; 
													?>
													
												<?php endif ?>
												<?php if ($boolchecker==false): ?>

												<td><?php echo $item->program; ?></td>
												<td><?php echo $item->year; ?></td>
												<td><?php echo number_format(($item->tuition_fee + $item->misc)) ?></td>
												<td><span>&#8369</span><?php echo " " . number_format($item->tuition_fee); ?></td>
												<td><span>&#8369</span><?php echo " " . number_format($item->misc); ?></td>
												<td><span>&#8369</span><?php echo " " . number_format($item->down_payment); ?></td>
												<!-- <td><span>&#8369</span><?php echo " " . number_format($item->breakdown); ?></td> -->
												<td><span>&#8369</span><?= " " . number_format(($item->dis_tuition)); ?></td>
												<td><span>&#8369</span><?= " " . number_format(($item->dis_misc)); ?></td>
												<td><span>&#8369</span><?php echo " " . number_format($item->balance); ?></td>
												<?php endif; ?>
											</tr>
										<?php endif ?>
									<?php endif ?>
								<?php endforeach ?>
						<?php endforeach; ?>	
					<?php endif ?>
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
