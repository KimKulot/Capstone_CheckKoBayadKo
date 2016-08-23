                                                                                                             
<?php if ($current_user): ?>	
<!-- <input type="submit" name="submit" value="submit" /> -->

<!-- START STUDENT NAME -->
<h3></h3>
<!-- END STUDENT NAME -->


<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active"><?php echo $current_user->lastname . ", " . $current_user->firstname . " " . $current_user->middlename; ?> | </li>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">
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
											<?php if ($current_user->id == $student->student_id): ?>

												
											  <tr>
											  		
											  		<!-- START DISPLAY -->
											  		<?php if (!$count >= 1): ?>
											  			<?php echo "<h3>Course: $student->program</h3>"; ?>
											  			<td><span>&#8369</span><?php echo " " . number_format(($history->tuition_fee + $history->misc + $history->other_fees)) ?></td>
														<td><span>&#8369</span><?php echo " " . number_format($history->tuition_fee); ?></td>
														<td><span>&#8369</span><?php echo " " . number_format($history->misc); ?></td>
														<td><span>&#8369</span><?php echo " " . number_format($history->other_fees); ?></td>
											  			<?php $count++; ?>
														<td><span>&#8369</span><?php echo " " . number_format($history->breakdown); ?></td>
													<?php endif ?>
													<!-- END DISPLAY -->

											 </tr>
											<?php endif ?>
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
									
									<th>Payment</th>
									<th>Overall payment</th>
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
											<?php if ($current_user->id == $student->student_id): ?>
											  <tr>
											  		
											  		<!-- START DISPLAY -->
													<td><span>&#8369</span><?php echo " " . number_format($history->down_payment); ?></td>
													<td><span>&#8369</span><?php echo " " . number_format($history->payment); ?></td>
													<td><span>&#8369</span><?php echo " " . number_format($history->balance); ?></td>
													<td><?php echo $history->date_time; ?></td>
													<!-- END DISPLAY -->


											 </tr>
											<?php endif ?>
										<?php endif ?>
									<?php endif ?>
								<?php endforeach ?>
								
							<?php endforeach ?>	
						<?php endforeach ?>
						<!-- //END STUDENT PROFILE -->

							</tbody>
						</table>

						<?php else: ?>
						<p>No Users.</p>

						<?php endif; ?><!-- <p>
							<?php echo Html::anchor('admin/users/create', 'Add new User', array('class' => 'btn btn-success')); ?>

						</p>
						 -->
						 </div>
            </div>
        </div><!--end .section-body -->
    </section>
