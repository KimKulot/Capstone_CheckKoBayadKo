<h2>Parent</h2>
<br>
<?php if ($current_user): ?>
	<!-- START STUDENT NAME -->
<h3><?php echo $current_user->lastname . ", " . $current_user->firstname . " " . $current_user->middlename; ?></h3>
<!-- END STUDENT NAME -->
<!-- <input type="submit" name="submit" value="submit" /> -->				
<table class="table table-striped">
<thead>
		<tr>
			<th>Student name</th>		
			<th>Tuition fee</th>
			<th>Miscellaneous</th>
			<th>Down Payment</th>
			<th>Amount per Exam</th>
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
						<td><?php echo $student->tuition_fee ?></td>
						<td><?php echo $student->misc; ?></td>
						<td><?php echo $student->down_payment; ?></td>
						<td><?php echo $student->breakdown; ?></td>
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

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/users/create', 'Add new User', array('class' => 'btn btn-success')); ?>

</p>
 -->
 
