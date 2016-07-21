                                                                                                             
<h2>Student</h2>
<br>
<?php if ($current_user): ?>	
<!-- <input type="submit" name="submit" value="submit" /> -->

<!-- START STUDENT NAME -->
<h3><?php echo $current_user->lastname . ", " . $current_user->firstname . " " . $current_user->middlename; ?></h3>
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
					<?php if ($current_user->id == $student->student_id): ?>

						
					  <tr>
					  		
					  		<!-- START DISPLAY -->
					  		<?php if (!$count >= 1): ?>
					  			<?php echo "<h3>Course: $student->course</h3>"; ?>
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
					<?php if ($current_user->id == $student->student_id): ?>
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
 
