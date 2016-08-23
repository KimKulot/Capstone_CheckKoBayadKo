<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Student</li>
                </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">

				<!-- START STUDENT NAME -->
				<?php foreach ($currents as $current): ?>
					<?php foreach ($students as $studyante): ?>
						<?php if ($current->id == $studyante->id): ?>
							<?php foreach ($users as $user): ?>
								<?php if ($studyante->student_id == $user->id): ?>
									<h1><?php echo $user->lastname . ", " . $user->firstname . " " . $user->middlename; ?></h1>
								<?php endif ?>
							<?php endforeach ?>
						<?php endif ?>
					<?php endforeach ?>
				<?php endforeach ?>
				<!-- END STUDENT NAME -->
					
				<!-- START TOTAL ASSESSMENT -->
				<table class="table table-striped">
				<thead>
						<tr>
							
							<th>Total Assessment</th>
							<th>Tuition fee</th>
							<th>Miscellaneous</th>
							<th>Other Fees</th>
							<th>Amount per Exam</th>
							
						</tr>
					</thead>
				<!-- //START STUDENT PROFILE -->
				<?php $count = 0; ?>
				<?php foreach ($students as $student): ?>
					<?php foreach ($users as $user): ?>

						<?php foreach ($histories as $history): ?>
							<?php if ($student->id == $history->studenthistory_id): ?>
								<?php if ($user->id == $student->student_id): ?>
									<?php foreach ($currents as $current): ?>
										<?php foreach ($currents as $current): ?>
											<?php $view['uses'] = DB::select('id')->from('users')->where('id', '=', $current->student_id)->as_object()->execute(); ?>
											<?php foreach ($view['uses'] as $use): ?>
												<?php if ($use->id == $student->student_id): ?>
												  <tr>
												  		
												  		<!-- START DISPLAY -->
												  		<?php if (!$count >= 1): ?>
												  			<?php echo "<h3>Course: $student->program</h3>"; ?>
												  			<td><?php echo number_format(($history->tuition_fee + $history->misc + $history->other_fees)) ?></td>
															<td><?php echo number_format($history->tuition_fee); ?></td>
															<td><?php echo number_format($history->misc); ?></td>
															<td><?php echo number_format($history->other_fees); ?></td>
												  			<?php $count++; ?>
															<td><?php echo number_format($history->breakdown); ?></td>
														<?php endif ?>
														<!-- END DISPLAY -->

												  </tr>
												<?php endif ?>
											<?php endforeach ?>
											
										<?php endforeach ?>
										
									<?php endforeach ?>
									
								<?php endif ?>
							<?php endif ?>
						<?php endforeach ?>
						
					<?php endforeach ?>	
				<?php endforeach ?>
				<!-- //END STUDENT PROFILE -->

					</tbody>
				</table>
				<!-- END TOTAL ASSESSMENT -->

				<table class="table table-striped">

				<thead>
						<tr>
							
							<th>Down Payment</th>
							<th>Overall payment</th>
							<th>Amount per Exam</th>
							<th>Amount per Exam Balance</th>
							<th>Balance</th>
							<th>Date and Time</th>
							
						</tr>
					</thead>
				<!-- //START STUDENT PROFILE -->

				<?php foreach ($students as $student): ?>
					<?php foreach ($users as $user): ?>

						<?php foreach ($histories as $history): ?>
							<?php if ($student->id == $history->studenthistory_id): ?>
								<?php if ($user->id == $student->student_id): ?>
									<?php foreach ($currents as $current): ?>
											<?php $view['uses'] = DB::select('id')->from('users')->where('id', '=', $current->student_id)->as_object()->execute(); ?>
										<?php foreach ($view['uses'] as $use): ?>
											<?php if ($use->id == $student->student_id): ?>
											  <tr>
											  		
											  		<!-- START DISPLAY -->
													<td><?php echo number_format($history->down_payment); ?></td>
													<td><?php echo number_format($history->payment); ?></td>
													<td><?php echo number_format($history->breakdown); ?></td>
													<td><?php echo number_format($history->breakdown - $history->down_payment); ?></td>
													<td><?php echo number_format($history->balance); ?></td>
													<td><?php echo $history->date_time; ?></td>
													<!-- END DISPLAY -->


											 </tr>
											<?php endif ?>
										<?php endforeach ?>
									<?php endforeach ?>
								<?php endif ?>
							<?php endif ?>
						<?php endforeach ?>
						
					<?php endforeach ?>	
				<?php endforeach ?>
				<!-- //END STUDENT PROFILE -->

					</tbody>
				</table>

				</div>
            </div>
        </div>
    </section>


 
