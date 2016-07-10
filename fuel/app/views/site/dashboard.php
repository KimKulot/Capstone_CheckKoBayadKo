                                                                                                             
<h2>Student</h2>
<br>
<?php if ($current_user): ?>	
<!-- <input type="submit" name="submit" value="submit" /> -->				
<table class="table table-striped">
	<thead>
		<tr>
			<th>Full Name</th>
			<th>Phone number</th>
			<th>Email</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	
	<!-- 
	<form class="form-inline">
		<div class="form-group">
			<label class="sr-only">Email</label>
			<p class="form-control-static">email@example.com</p>
		</div>
		<div class="form-group">
			<label for="inputPassword2" class="sr-only">Password</label>
			<input type="password" class="form-control" id="inputPassword2" placeholder="Password">
		</div>
		<button type="submit" class="btn btn-default">Confirm identity</button>
	</form> -->

			<!-- <input type="text" class="form-control" placeholder=".col-xs-3"> -->
	
	
<!-- //START USER PROFILE -->
<?php foreach ($users as $item): ?>
	<?php if ($current_user->username == $item->username): ?>
	  <tr>
		<td><?php echo $item->lastname . ', ' . $item->firstname . ' ' . $item->middlename ?></td>
		<td><?php echo $item->phone_number; ?></td>

		<td><?php echo $item->email; ?></td>
		<!-- <td>
			<?php echo Html::anchor('admin/users/view/'.$item->id, 'View'); ?> |
			<?php echo Html::anchor('admin/users/edit/'.$item->id, 'Edit'); ?> |
			<?php echo Html::anchor('admin/users/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

		</td> -->
	 </tr>
	<?php endif ?>
<?php endforeach ?>
<!-- //END USER PROFILE -->

<thead>
		<tr>
			<th>Tuition fee</th>
			<th>Miscellaneous</th>
			<th>Down Payment</th>
			<th>Amount per Exam</th>
			<th>Balance</th>
			
		</tr>
	</thead>
<!-- //START STUDENT PROFILE -->

<?php foreach ($students as $student): ?>

	<?php if ($current_user->id == $student->student_id): ?>

	  <tr>
		<td><?php echo $student->tuition_fee ?></td>
		<td><?php echo $student->misc; ?></td>
		<td><?php echo $student->down_payment; ?></td>
		<td><?php echo $student->breakdown; ?></td>
		<td><?php echo $student->balance; ?></td>
		
	 </tr>
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
 
