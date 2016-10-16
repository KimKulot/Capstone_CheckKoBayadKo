<!-- <?php //echo Asset::css('theme-default/materialadmin.css'); ?> -->
<title>Welcome dear students!</title>                                                                                              
<?php if ($current_user): ?>	

<!-- START STUDENT NAME -->
<h3></h3>
<!-- END STUDENT NAME -->


<div id="content">
    <section>
        <!-- start: page -->
						<div class="row">
							<div class="col-md-12">
								<section class="panel panel-featured panel-featured-dark panel-info">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
										</div>
						
										<h2 class="panel-title"> 
										<?php foreach ($dates as $date): ?>
										<?php echo  "THE DATE OF EXAM WILL BE: " . $date->date_time; ?>
										<?php endforeach ?>
											
										</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-striped table-hover mb-none">
											
												<thead>
														<tr>
															
															<th>Total Assessment</th>
															<th>Tuition fee</th>
															<th>Miscellaneous</th>
															<th>Total Payment</th>
															<th>Overall Discount</th>
															<!-- <th>Amount per Exam</th> -->
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
														  		<?php $count++; ?>
														  			<?php
														  			 $student_course = $student->program;
														  			 echo "<h3>Course: " . $student->program. " " . $student->year .  "</h3>"; ?>
														  			 	<?php $resultmisc = 0; ?>
																	<!-- get  -->
																	<?php foreach ($misc as $mis): ?>
																		<?php foreach ($programs as $program): ?>
																			<?php if ($program->basic_program_description == $student_course): ?>
																				<?php if($mis->program_id == $program->id): ?>
																				  		<!-- START DISPLAY -->

																							<?php $resultmisc = $resultmisc + $mis->amount; ?> 
																						
																						<!-- END DISPLAY -->
																				 <?php endif ?>
																			<?php endif ?>
																		<?php endforeach ?>
																	<?php endforeach ?>

																	<!-- Total Assessment -->
														  			<td><span>&#8369</span><?php echo " " . number_format($history->total_assessment, 2) ?></td>
														  			<!-- end Total Asessment -->
																	
																	<!-- Tuition fee  -->
																	<td><span>&#8369</span><?php echo " " . number_format($history->tuition_fee, 2); ?></td>
																	<!-- end Tuition fee  -->

																	<?php 
																			$distuition = ($history->tuition_fee / 100) * ($history->dis_tuition);
																			$dismisc = ($history->misc / 100) * ($history->dis_misc);
																	?>
																	
																	<!-- Miscellaneous -->
																	<td><span>&#8369</span><?php echo " " . number_format($history->misc , 2); ?></td>
																	<!-- end Miscellaneous fee  -->

																	<!-- Total Payment -->
																	<td><span>&#8369</span><?php echo " " . number_format($history->payment , 2); ?></td>
																	<!-- end Total Payment fee  -->
																	
																	<!-- Overall Discount -->
																	<td><span>&#8369</span><?php echo " " . number_format($history->dis_misc + $history->dis_tuition , 2); ?></td>
																	<!-- end Overall Discount  -->

														  			
																	<!-- <td><span>&#8369</span><?php echo " " . number_format($history->breakdown, 2); ?></td> -->

																	<!-- <?php $history->breakdown = $history->breakdown + ($resultmisc / 4); ?>  -->
																	<?php $breakdown = ($history->total_assessment - ($history->dis_tuition + $history->dis_misc + $history->payment)) / 4; ?>
																	<!-- <?= $breakdown; ?> -->
																	<!-- <?php echo $breakdown; ?> -->
																	<!-- BEGIN DIFFERENCE TOTAL PAYMENT / AMOUNT PER EXAM -->
																	<?php $result = ($history->payment + $history->dis_misc + $history->dis_tuition)/$breakdown; ?>
																	<!-- <?= $result; ?> -->

																	<?php $overall_payment = $history->payment + $history->dis_misc + $history->dis_tuition; ?>
																	<!-- <?php 	echo $overall_payment; ?> -->
																																		
																	<!-- END DIFFERENCE TOTAL PAYMENT / AMOUNT PER EXAM -->
																	<!-- <?php //echo number_format(3); ?> -->

																	<!-- <?php $result2 = ($history->payment + $history->dis_misc + $history->dis_tuition) - $breakdown;?>
																	<?php 
																		echo $result2; 
																	?> -->
																	<?php $result2 = $history->total_assessment - ($history->payment + $history->dis_misc + $history->dis_tuition); ?>
																	<?= $result2; ?>
																	
																	<?php echo $history->payment; ?>


																	<!-- BEGIN BREAKDOWN -->
																	<?php if ($overall_payment >= $breakdown): ?>
																			<!-- BEGIN PRELIM CHECK RESULT -->
																			<?php if ($result < 1): ?>
																				<?php $indicate_breakdown =  $overall_payment - (0 * $breakdown);  ?>
																				<td>
																					<span>&#8369</span><?php echo " " . (number_format($breakdown - $indicate_breakdown , 2)); ?>
																				</td>

 																				<td>
																					<span>&#8369</span><?php echo " " . number_format($breakdown, 2) ; ?>
																				</td>

																				<td>
																					<span>&#8369</span><?php echo " " . number_format($breakdown, 2) ; ?>
																				</td>
																				<td>
																					<span>&#8369</span><?php echo " " . number_format($breakdown, 2) ; ?>
																				</td>

																			<?php endif ?>
																			<!-- END PRELIM CHECK RESULT -->


																			<!-- BEGIN MIDTERM CHECK RESULT -->
																			<?php if ($result >= 1 && $result < 2): ?>
																				<td>
																					Paid
																				</td>

																				<?php $indicate_breakdown =  $overall_payment - (1 * $breakdown);  ?>
																				<!-- <?php 	echo $breakdown; ?> -->
																				<td>
																					<span>&#8369</span><?php echo " " . (number_format($breakdown - $indicate_breakdown , 2)); ?>
																				</td>
																				<td>
																					<span>&#8369</span><?php echo " " . number_format($breakdown, 2) ; ?>
																				</td>
																				<td>
																					<span>&#8369</span><?php echo " " . number_format($breakdown, 2) ; ?>
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
																				<?php $indicate_breakdown =  $overall_payment - (2 * $breakdown);  ?>
																				<td>
																					<span>&#8369</span><?php echo " " . (number_format($breakdown - $indicate_breakdown , 2)); ?>
																				</td>
																				<td>
																					<span>&#8369</span><?php echo " " . number_format($breakdown, 2) ; ?>
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
																			<?php $indicate_breakdown =  $overall_payment - (3 * $breakdown);  ?>
																			<!-- <?php 	echo $indicate_breakdown; ?> -->
																			<td>
																				<span>&#8369</span>
																				<?php echo " " . number_format($breakdown - $indicate_breakdown , 2) ; ?>
																			</td>
																		<?php endif ?>

																		<?php if ($result >= 4): ?>
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
																				Paid
																			</td>
																		<?php endif ?>
																	
																	<?php endif ?>

																	<!-- <?php if($history->payment <= $breakdown): 

																	?>
																		<td>
																			<span>&#8369</span><?php echo " " . number_format($breakdown,  2) ; ?>
																		</td>
																		<td>
																			<span>&#8369</span><?php echo " " . number_format($breakdown,2) ; ?>
																		</td>
																		<td>
																			<span>&#8369</span><?php echo " " . number_format($breakdown,2) ; ?>
																		</td>
																		<td>
																			<span>&#8369</span><?php echo " " . number_format($breakdown,2) ; ?>
																		</td>

																	<?php endif ?> -->
																	<!-- END BREAKDOWN -->
																<?php endif ?>
																<!-- END DISPLAY -->
														 </tr>
													<?php endforeach ?>	
												<?php endforeach ?>
												<!-- //END STUDENT PROFILE -->

											</tbody>
										</table>
									</div>
								</div>
							</section>
						</div>
						<!-- END TOTAL ASSESSMENT -->



	

						     <!-- start: page -->
						<div class="row">
							<div class="col-md-12">
								<section class="panel panel-featured panel-featured-dark panel-info">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
										</div>
						
										<h2 class="panel-title"> 
											Miscellanous
										</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-striped table-hover mb-none">
											<thead>
											
													<tr>
														<th>Type</th>
														<th>Amount</th>
													</tr>
												</thead>
											<!-- //START STUDENT PROFILE -->

											<?php foreach ($misc as $mis): ?>
												<?php var_dump($mis); ?>
												<?php foreach ($programs as $program): ?>
													<?php var_dump($student_course); ?>
													<?php if ($program->basic_program_description == $student_course): ?>
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
								</section>
							</div>


						<div class="row">
							<div class="col-md-12">
								<section class="panel panel-featured panel-featured-dark panel-info">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
										</div>
						
										<h2 class="panel-title"> 
											History of Payments
										</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-striped table-hover mb-none">
											<thead>
													<tr>
													
														<th>Payment</th>
														<th>Overall payment</th>
														<th>Tuition Discount</th>
														<th>Miscellaneous Discount</th>
														<th>Total Assessment</th>
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
																		<!-- start Assigning Discounted tuition and miscellaneous -->
																		<?php 
																			$distuition = ($history->tuition_fee / 100) * ($history->dis_tuition);
																			$dismisc = ($history->misc / 100) * ($history->dis_misc);

																		?>
																		<!-- end Assigning Discounted tuition and miscellaneous -->

																		<td><span>&#8369</span><?= " " . $history->dis_tuition; ?></td>
																		<td><span>&#8369</span><?= " " . $history->dis_misc; ?></td>
																		<td><span>&#8369</span><?= " " . $history->total_assessment; ?></td>
																		<td><span>&#8369</span><?php echo " " . number_format($history->balance, 2); ?></td>

																		<td><?php echo $history->date_time; ?></td> 
																		<!-- END DISPLAY -->
																 </tr>
																
												<?php endforeach ?>	
											<?php endforeach ?>
											
											<!-- //END STUDENT PROFILE -->

												</tbody>
											</table>
										</div>
									</div>
								</section>
							</div>


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
