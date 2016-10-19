<title>Welcome dear parents!</title>
<?php if ($current_user): ?>
	<!-- START STUDENT NAME -->
<!-- END STUDENT NAME -->
<!-- <input type="submit" name="submit" value="submit" /> -->
<div class="row">
	<div class="col-md-12">
		<section class="panel panel-featured panel-featured-dark panel-info">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
				</div>

				<h2 class="panel-title"> 
					<?php foreach ($dates as $date): ?>
					   <?php echo  "Your Students / THE DATE OF EXAM WILL BE: " . $date->date_time; ?>
				    <?php endforeach ?>
				</h2>
			</header>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover mb-none">
						
						<thead>
								<tr>
									<th>Student name</th>
									<th>Total Assessment</th>	
									<th>Tuition fee</th>
									<th>Miscellaneous</th>
									<th>Payment</th>
									<th>Overall Discount</th>
									<th>Balance</th>
									
								</tr>
							</thead>
							
						<!-- //START STUDENT PROFILE -->

						<?php foreach ($studparents as $studparent): ?>

							<?php if ($current_user->id == $studparent->parent_id): ?>
								<?php foreach ($students as $student): ?>
									<?php foreach ($users as $user): ?>
										<?php if ($user->id == $student->student_id): ?>
											<?php if ($studparent->student_id == $student->id): ?>
											  <tr>
											  	<td><?php echo $user->lastname . ", " . $user->firstname . " " . $user->middlename; ?></td>
											  	<td><?php echo $student->total_assessment ?></td>
												<td><?php echo $student->tuition_fee ?></td>
												<td><?php echo $student->misc; ?></td>
												<td><?php echo $student->down_payment; ?></td>
												<td><?php echo $student->dis_misc + $student->dis_tuition; ?></td>
												<td><?php echo $student->balance; ?></td>
											 </tr>
											<?php endif ?>
										<?php endif ?>
									<?php endforeach ?>
									
								<?php endforeach ?>
							<?php endif ?>
						<?php endforeach ?>
						<!-- //END STUDENT PROFILE -->

							</tbody>
						</table>
					</div>
				</div>
			</section>
		</div>
</div>
<?php else: ?>
<p>No Users.</p>

<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/users/create', 'Add new User', array('class' => 'btn btn-success')); ?>

</p>
 -->
 
