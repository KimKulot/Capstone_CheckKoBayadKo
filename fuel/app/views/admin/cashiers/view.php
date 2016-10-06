<!-- <?php //echo Asset::css('theme-default/materialadmin.css'); ?> -->
<title>Welcome dear students!</title>                                                                                              
<?php if ($current_user): ?>	

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
                <div class="card-body" style="background-color:#FFF; padding:5px 20px;  margin-top:-25px">
						<!-- START TOTAL ASSESSMENT -->
						<table class="table table-responsive">
						<thead>
								<tr>
									
									<th>Total Assessment</th>
									<th>Tuition fee</th>
									<th>Miscellaneous</th>
									<th>Amount per Exam</th>
									<th>Prelim</th>
									<th>Midterm</th>
									<th>Semi-final</th>
									<th>Final</th>
									
								</tr>
							</thead>
						<!-- //START STUDENT PROFILE -->
						<?php 
							$count = 0;
							$student_course = ""; 
						?>

						<?php foreach ($students as $student): ?>
								<?php foreach ($student->history as $history): ?>

											  <tr>
											  		<!-- START DISPLAY -->
											  		<?php if ($count < 1): ?>
											  			<?php
											  			 $student_course = $student->program;
											  			 echo "<h3>Course: " . $student->program. " " . $student->year .  "</h3>"; ?>
											  			<td><span>&#8369</span><?php echo " " . number_format(($history->tuition_fee + $history->misc), 2) ?></td>
														<td><span>&#8369</span><?php echo " " . number_format($history->tuition_fee, 2); ?></td>
														<td><span>&#8369</span><?php echo " " . number_format($history->misc, 2); ?></td>
											  			<?php $count++; ?>
														<td><span>&#8369</span><?php echo " " . number_format($history->breakdown, 2); ?></td>
														
														<!-- BEGIN DIFFERENCE TOTAL PAYMENT / AMOUNT PER EXAM -->
															<?php $result = $history->payment/$history->breakdown; ?>
														<!-- END DIFFERENCE TOTAL PAYMENT / AMOUNT PER EXAM -->

														<!-- BEGIN BREAKDOWN -->
														<?php if ($history->payment >= $history->breakdown): ?>
															<?php $result2 = $history->payment - $history->breakdown; ?>
																
																<!-- BEGIN MIDTERM CHECK RESULT -->
																<?php if ($result < 1): ?>
																	<td>
																		<span>&#8369</span><?php echo " " . abs(number_format($history->breakdown - $result2)); ?>
																	</td>
																	<td>
																		<span>&#8369</span><?php echo " " . number_format($history->breakdown) ; ?>
																	</td>
																	<td>
																		<span>&#8369</span><?php echo " " . number_format($history->breakdown) ; ?>
																	</td>
																	<td>
																		<span>&#8369</span><?php echo " " . number_format($history->breakdown) ; ?>
																	</td>

																<?php endif ?>
																<!-- END MIDTERM CHECK RESULT -->


																<!-- BEGIN MIDTERM CHECK RESULT -->
																<?php if ($result >= 1 && $result < 2): ?>
																	<td>
																		Paid
																	</td>
																	<td>
																		<span>&#8369</span><?php echo " " . abs(number_format($history->breakdown - $result2)); ?>
																	</td>
																	<td>
																		<span>&#8369</span><?php echo " " . number_format($history->breakdown) ; ?>
																	</td>
																	<td>
																		<span>&#8369</span><?php echo " " . number_format($history->breakdown) ; ?>
																	</td>

																<?php endif ?>
																<!-- END MIDTERM CHECK RESULT -->
																<?php if ($result >= 2 && $result < 3): ?>

																	<td>
																		Paid
																	</td>
																	<td>
																		Paid
																	</td>
																	<td>
																		<span>&#8369</span><?php echo " " . abs(number_format($history->breakdown - $result2)); ?>
																	</td>
																	<td>
																		<span>&#8369</span><?php echo " " . number_format($history->breakdown) ; ?>
																	</td>

																<?php endif ?>

															<?php if ($result >= 3 && $result < 4): ?>
																<td>
																	Paid
																</td>
																<td>
																	Paid
																</td>
																<td>
																	Paid
																</td>
																<td>
																	<span>&#8369</span>
																	<?php echo " " . number_format($history->breakdown - $result2) ; ?>
																</td>
															<?php endif ?>

														<?php endif ?>
														<!-- END BREAKDOWN -->

															
													<?php endif ?>
													<!-- END DISPLAY -->

											 </tr>
										
								
							<?php endforeach ?>	
						<?php endforeach ?>
						<!-- //END STUDENT PROFILE -->

							</tbody>
						</table>
						<!-- END TOTAL ASSESSMENT -->





						    <div class="card contain-sm style-transparent">
						        <div class="row">
						                <div class="col-sm-8" style="text-align: left;">
						<table class="table table-hover">
						<thead>
						<h3>Miscellanous</h3>
								<tr>
									<th>Type</th>
									<th>Amount</th>
								</tr>
							</thead>
						<!-- //START STUDENT PROFILE -->

						<?php foreach ($misc as $mis): ?>
							<?php foreach ($programs as $program): ?>
								<?php if ($program->program_description == $student_course): ?>
									<?php if($mis->program_id == $program->id): ?>
									  <tr>
									  		<!-- START DISPLAY -->
											<td><?php echo $mis->type; ?></td> 
											<td><span>&#8369</span><?php echo " " . number_format($mis->amount, 2); ?></td>
											<!-- END DISPLAY -->
									 </tr>
									 <?php endif ?>
								<?php endif ?>
							<?php endforeach ?>
						<?php endforeach ?>
						
						<!-- //END STUDENT PROFILE -->

							</tbody>
						</table>
				
             </div>
         </div>



						<table class="table table-striped">
						<thead>
								<tr>
								<h3>History of Payments</h3>
									<th>Payment</th>
									<th>Overall payment</th>
									<th>Balance</th>
									<th>Date and Time</th>
									
								</tr>
							</thead>
						<!-- //START STUDENT PROFILE -->

						<?php foreach ($students as $student): ?>
							<?php foreach ($student->history as $history): ?>
								
											  <tr>
											  		
											  		<!-- START DISPLAY -->
													<td><span>&#8369</span><?php echo " " . number_format($history->down_payment, 2); ?></td>
													<td><span>&#8369</span><?php echo " " . number_format($history->payment, 2); ?></td>
													<td><span>&#8369</span><?php echo " " . number_format($history->balance, 2); ?></td>
													<td><?php echo $history->date_time; ?></td> 
													<!-- END DISPLAY -->
											 </tr>
											
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
        </div>
    </section>
