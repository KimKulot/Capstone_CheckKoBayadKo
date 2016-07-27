<?php 
		if ($current_user->role != 1 && $current_user->role != 10) {
			Response::redirect('/');
		}
 ?>
 <h3><?php echo $current_user->lastname . ", " . $current_user->firstname . " " . $current_user->middlename; ?></h3>

<h2>Listing of Students</h2>
<br>

<?php if ($students): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Full Name</th>
			<th>Year Level</th>
			<th>Total Payment</th>
			<th>Tuition Fee</th>
			<th>Misc</th>
			<th>Other Fees</th>
			<th>Down Payment</th>
			<th>Ammount per exam</th>
			<th>Balance</th>
			<th></th>
		</tr>
	</thead>
	<tbody>	
<?php foreach ($progdeans as $progdean): ?>
	<?php if ($current_user->id == $progdean->dean_id): ?>
			<?php foreach ($students as $item): ?>
				<?php foreach ($programs as $program): ?>
					<?php if ($program->id == $progdean->program_id): ?>
						<?php if ($item->course == $program->program_description): ?>
							<tr>
								<?php foreach ($users as $key): ?>
									<?php if($item->student_id == $key->id){ ?>
										<td><?php echo $key->lastname . ', ' . $key->firstname . ' ' . $key->middlename ?></td>
									<?php } ?>
								<?php endforeach ?>
								<?php $count = 0; ?>
								<?php if ($count ==0): ?>
									<?php 
										echo $item->course;
										$count++; 
									?>
									
								<?php endif ?>
								
								<td><?php echo $item->year; ?></td>
								<td><?php echo number_format(($item->tuition_fee + $item->misc + $item->other_fees)) ?></td>
								<td><?php echo $item->tuition_fee; ?></td>
								<td><?php echo $item->misc; ?></td>
								<td><?php echo $item->other_fees; ?></td>
								<td><?php echo $item->down_payment; ?></td>
								<td><?php echo $item->breakdown; ?></td>
								<td><?php echo $item->balance; ?></td>
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
