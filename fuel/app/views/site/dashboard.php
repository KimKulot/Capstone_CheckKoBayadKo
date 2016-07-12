                                                                                                             
<h2>Student</h2>
<br>
<?php if ($current_user): ?>	
<!-- <input type="submit" name="submit" value="submit" /> -->				
<table class="table table-striped">
<!-- START STUDENT NAME -->
<h3><?php echo $current_user->lastname . ", " . $current_user->firstname . " " . $current_user->middlename; ?></h3>
<!-- END STUDENT NAME -->
<thead>
		<tr>		
			<th>Tuition fee</th>
			<th>Miscellaneous</th>
			<th>Down Payment</th>
			<th>Amount per Exam</th>
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
					 
						<td><?php echo $history->tuition_fee ?></td>
						<td><?php echo $history->misc; ?></td>
						<td><?php echo $history->down_payment; ?></td>
						<td><?php echo $history->breakdown; ?></td>
						<td><?php echo $history->balance; ?></td>
						<td><?php echo $history->date_time; ?></td>
				
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
 
